<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AchieveMedal;
use App\Models\Users;
use App\Models\Medal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class MedalsController extends Controller
{
    // Menampilkan daftar medali
    public function index()
    {
        $user = Auth::user();
        $users =Users::All();
        $medals = Medal::all();
        $achievements = AchieveMedal::with('user', 'medal')->latest()->get(); // Fix Query
        return view('DashboardAdmin.achievement.medals.index', compact('medals','user', 'achievements','users'));
    }

    // Menampilkan form tambah medali
    public function create()
    {
        return view('DashboardAdmin.medals.create');
    }

    // Menyimpan data medali
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:20|unique:medals,name',
        'type' => 'required|in:gold,silver,bronze',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        $picturePath = 'img/medals/default.png'; // Default path jika tidak ada gambar

        // Cek apakah ada gambar yang diupload
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Pastikan folder tujuan ada
            $destinationPath = public_path('img/medals');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Simpan file ke folder
            $file->move($destinationPath, $filename);
            $picturePath = 'img/medals/' . $filename;
        }

        // Gunakan create untuk menyimpan data
        Medal::create([
            'name' => $request->name,
            'type' => $request->type,
            'picture' => $picturePath,
        ]);

        return redirect()->route('medals.index')->with('success', 'Medali berhasil ditambahkan!');
    } catch (\Exception $e) {
            Log::error("Terjadi Kesalahan: " . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    // Menampilkan form edit medali
    public function edit($id)
    {
        $user = Auth::user();
        $medal = Medal::findOrFail($id);
        return view('DashboardAdmin.achievement.medals.edit', compact('medal','user'));
    }

    // Memperbarui data medali
    public function update(Request $request, $id)
    {
        $medal = Medal::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:20|unique:medals,name,' . $id,
            'type' => 'required|in:gold,silver,bronze',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $medal->name = $request->name;
        $medal->type = $request->type;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/medals'), $filename);
            $medal->picture = 'img/medals/' . $filename;
        }

        $medal->save();

        return redirect()->route('medals.index')->with('success', 'Medali berhasil diperbarui!');
    }

    // Menghapus medali
    public function destroy($id)
    {
        $medal = Medal::findOrFail($id);

        if ($medal->picture && file_exists(public_path($medal->picture))) {
            unlink(public_path($medal->picture));
        }

        $medal->delete();

        return redirect()->route('medals.index')->with('success', 'Medali berhasil dihapus!');
    }
}
