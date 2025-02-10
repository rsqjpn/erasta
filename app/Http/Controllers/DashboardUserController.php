<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        return view('dashboardUser.user.index', compact('user'));
    }
    public function profile()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        if (!$user) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu']);
        }

        // Ambil user dengan relasi achievements dan medal
        $user = Users::with('achievements.medal')->where('id', $user->id)->firstOrFail();

        return view('DashboardUser.user.profile', compact('user'));
    }
}
