<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;

class UsersController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = Users::all();
        return response()->json($users);
    }

    // Menampilkan user berdasarkan ID
    public function show($id)
    {
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }
    public function profile()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        if (!$user) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu']);
        }

        // Ambil user dengan relasi achievements dan medal
        $user = Users::with('achievements.medal')->where('id', $user->id)->firstOrFail();

        return view('DashboardUser.user.index', compact('user'));
    }


    public function edit()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        return view('DashboardUser.user.edit', compact('user'));
    }

    // Menambahkan user baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Users::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $request->profile ?? null,
            'alamat' => $request->alamat ?? null,
            'tanggal_lahir' => $request->tanggal_lahir ?? null,
            'isAtlet' => $request->isAtlet ?? 'no',
            'tanggal_join' => $request->tanggal_join ?? now(),
            'tingkat' => $request->tingkat ?? null
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }


    // Mengupdate data user
    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan!');
        }

        $validator = Validator::make($request->all(), [
            'username' => 'sometimes|required|string|max:50|unique:users,username,' . $id,
            'email' => 'sometimes|required|string|email|max:100|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->update([
            'username' => $request->username ?? $user->username,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'profile' => $request->profile ?? $user->profile,
            'alamat' => $request->alamat ?? $user->alamat,
            'tanggal_lahir' => $request->tanggal_lahir ?? $user->tanggal_lahir,
            'isAtlet' => $request->isAtlet ?? $user->isAtlet,
            'tanggal_join' => $request->tanggal_join ?? $user->tanggal_join,
            'tingkat' => $request->tingkat ?? $user->tingkat
        ]);

        return redirect()->route('profile')->with('success', 'User berhasil diperbarui!');
    }



    // Menghapus user
    public function destroy($id)
    {
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
