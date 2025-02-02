<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatLatihan;

class GuestController extends Controller
{
    public function index()
    {
        $locations = TempatLatihan::all(); // Ambil semua lokasi dari database
        return view('DashboardPengunjung.main', compact('locations'));
    }

}
