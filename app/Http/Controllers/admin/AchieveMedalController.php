<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AchieveMedal;
use App\Models\Users;
use App\Models\Medal;
use Illuminate\Support\Facades\Auth;

class AchieveMedalController extends Controller
{
    // ✅ Menampilkan daftar achievement
    public function index()
    {
        $user = Auth::user();
        $medals = Medal::all();
        $achievements = AchieveMedal::with('user', 'medal')->latest()->get(); // Fix Query

        return view('DashboardAdmin.achievement.medals.index', compact('medals', 'user', 'achievements'));
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $users = Users::All();
        $medals = Medal::all();
        $achievements = AchieveMedal::with('user', 'medal')->latest()->get(); // Fix Query

        $search = $request->input('search');

        $achievements = AchieveMedal::with(['user', 'medal'])
        ->when($search, function ($query) use ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%");
            })->orWhereHas('medal', function ($q) use ($search) {
                $q->where('type', 'like', "%{$search}%");
            });
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Harus pakai paginate

        return view('DashboardAdmin.achievement.medals.index', compact('achievements','medals', 'user', 'achievements','users'));
    }


    // ✅ Menampilkan halaman tambah achievement
    public function create()
    {
        $users = Users::all();
        $medals = Medal::all();
        return view('DashboardAdmin.achievement.medals.create', compact('users', 'medals'));
    }

    // ✅ Simpan achievement medal ke database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'medal_id' => 'required|exists:medals,id',
            'deskripsi' => 'nullable|string|max:255',
        ]);



        // ✅ Ambil kode dari medali yang dipilih
        $medal = Medal::findOrFail($request->medal_id);

        // ✅ Simpan data
        AchieveMedal::create([
            'user_id' => $request->user_id,
            'medal_id' => $request->medal_id,
            'deskripsi' => $request->deskripsi ?? 'Pencapaian baru',
            'code' => strtoupper(substr($medal->type, 0, 3)) . rand(100, 999), // Contoh kode: "GOL123"
            'achieved_at' => now(),
        ]);

        return redirect()->route('medals.index')->with('success', 'Medali berhasil diberikan kepada user!');
    }

    // ✅ Hapus data achievement medal
    public function destroy($id)
    {
        $achievement = AchieveMedal::find($id);

        if (!$achievement) {
            return redirect()->route('achieve_medals.index')->with('error', 'Data tidak ditemukan!');
        }

        $achievement->delete();
        return redirect()->route('achieve_medals.index')->with('success', 'Pencapaian medali berhasil dihapus!');
    }
}
