<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatLatihan;
use App\Models\Jadwal;

class GuestController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['tempatLatihan', 'pelatih'])->get();

        $events = $jadwal->map(function ($item) {
            // Cek apakah pelatih tersedia
            $pelatih = collect(json_decode($item->id_pelatih))->map(function ($id) use ($item) {
                return $item->pelatih ? $item->pelatih->firstWhere('id', $id)->nama ?? 'Tidak Ditemukan' : 'Tidak Ditemukan';
            })->implode(', ');

            return [
                'title' => 'Latihan di ' . ($item->tempatLatihan->nama ?? 'Tempat Tidak Ditemukan'),
                'start' => $item->tanggal,
                'description' => 'Pelatih: ' . $pelatih,
            ];
        });
        $locations = TempatLatihan::all(); // Ambil semua lokasi dari database
        return view('DashboardPengunjung.main', compact('locations', 'events'));
    }
}
