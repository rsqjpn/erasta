<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Tampilkan semua user di halaman admin
    public function index()
    {
        $user = Auth::user();
        $adminCount = Users::where('role', 'admin')->count();
        $userCount = Users::where('role', 'anggota')->count();
        $otherCount = Users::where('role', 'pelatih')->count();
        $users = Users::all();
        return view('DashboardAdmin.userManagement.index', compact('user','users', 'adminCount', 'userCount', 'otherCount'));

    }
    public function anggota(Request $request)
    {
        // Ambil query pencarian dari input user
        $search = $request->input('search');
        $user = Auth::user();

        // Filter user berdasarkan nama atau email jika ada input pencarian
        $users = Users::when($search, function ($query, $search) {
            return $query->where('username', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%");
        })->get();

        // Hitung jumlah user berdasarkan role
        $adminCount = Users::where('role', 'admin')->count();
        $userCount = Users::where('role', 'anggota')->count();
        $otherCount = Users::where('role', 'pelatih')->count();

        return view('DashboardAdmin.userManagement.anggota.show', compact('user', 'users', 'adminCount', 'userCount', 'otherCount', 'search'));
    }


    // Menampilkan halaman tambah user
    public function create()
    {
        return view('admin.users.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        // Ambil ID terakhir dari database dan tambahkan 1 untuk urutan berikutnya
        $lastUser = Users::latest('id')->first();
        $nextNumber = $lastUser ? $lastUser->id + 1 : 1; // Jika tidak ada user, mulai dari 1

        // Format Kode NIP (misal: ANG-2024-0001)
        $kodeNIP = 'ERS-' . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:100|unique:users',
                'tanggal_lahir' => 'nullable|date',
                'tanggal_join' => 'nullable|date',
                'no_telp' => 'nullable',
                'category' => 'required|in:yes,no',
                'alamat' => 'nullable|string|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah user mengunggah gambar atau tidak
        if ($request->hasFile('profile')) {
            $imagePath = $request->file('profile')->store('img/profile', 'public');
        } else {
            $imagePath = 'img/profile/default.png'; // Gambar default
        }

        Users::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'),
            'profile' => $imagePath,
            'alamat' => $request->alamat ?? null,
            'tanggal_lahir' => $request->tanggal_lahir ?? null,
            'isAtlet' => $request->category,
            'tanggal_join' => $request->tanggal_join ?? now(),
            'tingkat' => $request->tingkat ?? null,
            'role' => 'anggota',
            'no_telp' => $request->no_telp ?? null
        ]);

        return redirect()->route('anggota')->with('success', 'User berhasil ditambahkan!');
    }


    // Menampilkan halaman edit user
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('DashboardAdmin.userManagement.anggota.edit', compact('user'));
    }

    // Mengupdate user
    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'sometimes|required|string|max:50|unique:users,username,' . $id,
            'email' => 'sometimes|required|string|email|max:100|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,anggota,pelatih',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah ada file gambar diunggah
        if ($request->hasFile('profile')) {
            // Hapus gambar lama jika bukan default
            if ($user->profile && $user->profile !== 'img/profile/default.png') {
                Storage::delete('public/' . $user->profile);
            }

            // Simpan gambar yang baru
            $imagePath = $request->file('profile')->store('img/profile', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $imagePath = $user->profile;
        }

        // Update data user
        $user->update([
            'username' => $request->username ?? $user->username,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'profile' => $imagePath,
            'alamat' => $request->alamat ?? $user->alamat,
            'tanggal_lahir' => $request->tanggal_lahir ?? $user->tanggal_lahir,
            'isAtlet' => $request->isAtlet ?? $user->isAtlet,
            'tanggal_join' => $request->tanggal_join ?? $user->tanggal_join,
            'tingkat' => $request->tingkat ?? $user->tingkat,
            'role' => $request->role
        ]);

        return redirect()->route('anggota')->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }




}
