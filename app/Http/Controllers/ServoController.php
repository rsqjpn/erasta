<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServoController extends Controller
{
    public function index()
    {
        // Ambil suhu dari API eksternal
        $response = Http::withoutVerifying()->get('https://kanmoemployeeportal.com/apiV1/get-temperature');

        $temperature = ($response->successful() && isset($response->json()['suhu']))
            ? $response->json()['suhu']
            : 'Tidak dapat mengambil data';

        return view('testing.servo', compact('temperature'));
    }

    public function setTemperature(Request $request)
    {
        $request->validate([
            'temperature' => 'required|integer|in:15,25,30',
        ]);

        Cache::put('manual_temperature', $request->temperature, now()->addMinutes(10));

        return response()->json([
            'success' => true,
            'message' => "Suhu berhasil diatur ke " . $request->temperature . "°C",
        ]);
    }

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

    public function getMode()
    {
        return response()->json([
            'isAutomatic' => Cache::get('isAutomatic', false),
            'temperature' => Cache::get('manual_temperature', 25),
        ]);
    }
}
