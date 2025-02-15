<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index(){
        $user = Auth::user();
        $users = Users::All();
        return view('DashboardAdmin.achievement.piagam.index', compact('user',  'users'));
    }
}
