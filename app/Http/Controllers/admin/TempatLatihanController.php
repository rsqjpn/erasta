<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempatLatihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TempatLatihanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $locations = TempatLatihan::all();
        return view('DashboardAdmin.general.tempatlatihan.index', compact('locations', 'user'));
    }

    public function create()
    {
        return view('locations.create');
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'peta' => 'nullable|string|max:500',
            'deskripsi' => 'nullable|string',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i',
        ]);

        try {
            // Log data yang diterima
            // Log::info('Data Request: ', $request->all());

            // Simpan data
            TempatLatihan::create([
                'nama' => $request->name, // Sesuai dengan form input "name"
                'alamat' => $request->alamat,
                'peta' => $request->peta,
                'deskripsi' => $request->deskripsi,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Log jika berhasil
            // Log::info('Lokasi berhasil disimpan:', ['id' => $tempat->id]);

            return redirect()->route('location.index')
                ->with('success', 'Lokasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Log error jika terjadi kegagalan
            Log::error('Gagal menyimpan lokasi:', ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan lokasi.');
        }
    }


    public function show(TempatLatihan $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $location = TempatLatihan::findOrFail($id);
        return view('DashboardAdmin.general.tempatlatihan.edit', compact('location', 'user'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'peta' => 'nullable|string|max:500',
            'deskripsi' => 'nullable|string',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i',
        ]);

        // Jika validasi gagal, kembalikan ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $tempat = TempatLatihan::findOrFail($id);
            // Pastikan format waktu sesuai H:i
            $jamBuka = date("H:i", strtotime($request->jam_buka));
            $jamTutup = date("H:i", strtotime($request->jam_tutup));

            // Log sebelum update
            Log::info('Updating Location', ['id' => $id, 'data' => $request->all()]);

            $tempat->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'peta' => $request->peta,
                'deskripsi' => $request->deskripsi,
                'jam_buka' => $jamBuka,
                'jam_tutup' => $jamTutup,
                'updated_at' => now(),
            ]);

            // Log setelah berhasil update
            Log::info('Location updated successfully', ['id' => $id]);

            return redirect()->route('location.index')->with('success', 'Lokasi berhasil diperbarui!');
        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            Log::error('Error updating location', ['id' => $id, 'error' => $e->getMessage()]);

            return redirect()->back()->withInput()->withErrors(['general' => 'Terjadi kesalahan saat memperbarui lokasi.']);
        }
    }


    public function destroy(TempatLatihan $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Lokasi berhasil dihapus!');
    }
}
