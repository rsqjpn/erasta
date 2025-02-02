<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatih;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;




class PelatihController extends Controller
{
    // Menampilkan daftar pelatih
    public function pelatih()
    {
        $user = Auth::user();
        $users = Users::where('role', 'anggota')->get();
        $pelatih = Pelatih::all();
        return view('DashboardAdmin.userManagement.pelatih.index', compact('pelatih', 'users', 'user'));
    }
    public function anggota(Request $request)
    {
        // Ambil query pencarian dari input user
        $search = $request->input('search');
        $user = Auth::user();

        // Filter user berdasarkan nama atau email jika ada input pencarian
        $users = Users::when($search, function ($query, $search) {
            return $query->where('username', 'like', "%{$search}%")
                ->orWhere(
                    'email',
                    'like',
                    "%{$search}%"
                );
        })->get();


        $otherCount = Users::where('role', 'pelatih')->count();

        return view('DashboardAdmin.userManagement.pelatih.index', compact('user', 'users',  'otherCount', 'search'));
    }

    // Form tambah pelatih
    public function create()
    {
        // Ambil user yang memiliki role "pelatih"
        $users = Users::where('role', 'pelatih')->get();
        return view('pelatih.create', compact('users'));
    }

    // Menyimpan pelatih baru

    public function store(Request $request)
    {
        Log::info("Data Request: ", $request->all()); // Log request masuk

        try {
            // Cek apakah user ditemukan
            $user = Users::find($request->user_id);
            if (!$user) {
                Log::error("User tidak ditemukan dengan ID: " . $request->user_id);
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }

            Log::info("User ditemukan: ", [$user]);

            // Simpan data pelatih
            $pelatih = Pelatih::create([
                'user_id' => $user->id,
                'code' => 'PLT' . str_pad(Pelatih::count() + 1, 4, '0', STR_PAD_LEFT),
                'nama' => $user->username,
                'tgl_lahir' => $user->tanggal_lahir,
                'profile' => $user->profile ?? 'img/profile/default.png',
            ]);

            Log::info("Pelatih berhasil disimpan: ", [$pelatih]);

            // Ubah role user menjadi pelatih
            $user->update(['role' => 'pelatih']);
            Log::info("Role user diupdate menjadi pelatih.");

            DB::commit();

            return redirect()->route('pelatih.index')->with('success', 'Pelatih berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Terjadi Kesalahan: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
