<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // REGISTER USER
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Users::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('guest')->with('success', 'Registrasi berhasil!');
    }

    // LOGIN USER

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Simpan informasi user ke dalam session
            $user = Auth::user();
            Session::put('user', $user);

            // Cek role user
            if ($user->role === 'admin') {
                return redirect()->route('admin.users.index')->with('success', 'Login berhasil sebagai Admin!');
            } else {
                return redirect('/')->with('success', 'Login berhasil!');
            }
        }

        return redirect()->back()->withErrors(['username' => 'Username atau password salah!'])->withInput();
    }


    // LOGOUT USER
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }

    // GET USER PROFILE (WITH AUTH)
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }
}
