<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\Pelatih;
use App\Models\TempatLatihan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // Query Jadwal dengan Search
        $jadwal = Jadwal::with(['tempatLatihan'])
            ->when($search, function ($query) use ($search) {
                $query->where('tanggal', 'like', "%{$search}%")
                    ->orWhereJsonContains('id_pelatih', Pelatih::where('nama', 'like', "%{$search}%")->pluck('id')->toArray())
                    ->orWhereHas('tempatLatihan', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
            })
            ->paginate(10);

        $tempat_latihan = TempatLatihan::all();
        $pelatih = Pelatih::all();
        $user = Auth::user();

        return view('DashboardAdmin.general.jadwal.index', compact('jadwal', 'search', 'user', 'pelatih', 'tempat_latihan'));
    }
   




    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_pelatih' => 'required|integer',
            'id_tempat_latihan' => 'required|integer',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal created successfully.');
    }

    // generate jadwal


    public function generate(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'id_pelatih' => 'required|array',
            'id_pelatih.*' => 'integer|exists:pelatih,id',
            'id_tempat_latihan' => 'required|integer|exists:tempat_latihan,id',
        ]);

        $dates = [];
        $today = Carbon::today();

        try {
            // Generate tanggal berdasarkan tipe
            if ($request->type === 'week') {
                for ($i = 0; $i < 7; $i++) {
                    $dates[] = $today->copy()->addDays($i)->toDateString();
                }
            } elseif ($request->type === 'month') {
                $daysInMonth = $today->daysInMonth;
                for ($i = 0; $i < $daysInMonth; $i++) {
                    $dates[] = $today->copy()->addDays($i)->toDateString();
                }
            } elseif ($request->type === 'custom') {
                $request->validate([
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after_or_equal:start_date',
                ]);

                $start = Carbon::parse($request->start_date);
                $end = Carbon::parse($request->end_date);

                while ($start->lte($end)) {
                    $dates[] = $start->toDateString();
                    $start->addDay();
                }
            }

            foreach ($dates as $date) {
                // Cek apakah jadwal dengan tanggal dan tempat latihan sudah ada
                $existingJadwal = Jadwal::where('tanggal', $date)
                    ->where('id_tempat_latihan', $request->id_tempat_latihan)
                    ->first();

                if ($existingJadwal) {
                    // Gabungkan ID pelatih baru dengan ID pelatih yang sudah ada
                    $existingPelatih = json_decode($existingJadwal->id_pelatih, true) ?? [];
                    $mergedPelatih = array_unique(array_merge($existingPelatih, $request->id_pelatih));
                    $existingJadwal->update(['id_pelatih' => json_encode($mergedPelatih)]);
                } else {
                    // Jika belum ada, buat jadwal baru
                    Jadwal::create([
                        'tanggal' => $date,
                        'id_tempat_latihan' => $request->id_tempat_latihan,
                        'id_pelatih' => json_encode($request->id_pelatih),
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Jadwal berhasil dibuat!');
        } catch (\Exception $e) {
            // Log error jika terjadi kesalahan
            Log::error('Gagal membuat jadwal: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat jadwal.');
        }
    }







    public function edit(Jadwal $jadwal)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_pelatih' => 'required|integer',
            'id_tempat_latihan' => 'required|integer',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal updated successfully.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal deleted successfully.');
    }
}
