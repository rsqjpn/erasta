<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServoController extends Controller
{
    public function index()
    {
        // Mengabaikan verifikasi SSL sementara
        $response = Http::withoutVerifying()->get('https://kanmoemployeeportal.com/apiV1/get-temperature');

        if ($response->successful()) {
            $temperature = $response->json()['suhu'];
        } else {
            $temperature = 'Tidak dapat mengambil data';
        }

        return view('testing.servo', compact('temperature'));
    }

    public function setTemperature(Request $request)
    {
        $request->validate([
            'temperature' => 'required|integer|in:15,25,30',
        ]);

        $temperature = $request->temperature;
        Cache::put('manual_temperature', $temperature, now()->addMinutes(10));

        return response()->json([
            'success' => true,
            'message' => "Suhu berhasil diatur ke $temperature °C",
        ]);
    }

    // Set mode manual/otomatis
    public function setMode(Request $request)
    {
        $request->validate([
            'isAutomatic' => 'required|boolean',
        ]);

        Cache::put('isAutomatic', $request->isAutomatic, now()->addMinutes(10));

        return response()->json([
            'success' => true,
            'message' => "Mode diubah menjadi " . ($request->isAutomatic ? 'Otomatis' : 'Manual'),
        ]);
    }

    // Dapatkan mode dan suhu
    public function getMode()
    {
        $isAutomatic = Cache::get('isAutomatic', false);
        $temperature = Cache::get('manual_temperature', 25);

        return response()->json([
            'isAutomatic' => $isAutomatic,
            'temperature' => $temperature,
        ]);
    }
}
