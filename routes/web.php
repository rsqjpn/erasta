<?php

use App\Http\Controllers\Admin\AchieveMedalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PelatihController;
use App\Http\Controllers\Admin\MedalsController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\TempatLatihanController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\JadwalController as ControllersJadwalController;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route pengunjung

Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::get('/daftar', function () {
    return view('DashboardPengunjung.daftar');
});













Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/anggota', [UserController::class, 'anggota'])->name('anggota');
    Route::get('/anggota/edit/{id}', [UserController::class, 'edit'])->name('edit.anggota');


    Route::get('/pelatih', [PelatihController::class, 'pelatih'])->name('pelatih.index');
    Route::get('/create', [PelatihController::class, 'create'])->name('pelatih.create');
    Route::post('/pelatih/store', [PelatihController::class, 'store'])->name('pelatih.store');
    Route::delete('/pelatih/{id}', [PelatihController::class, 'destroy'])->name('pelatih.destroy');

    Route::get('/medals', [MedalsController::class, 'index'])->name('medals.index');
    Route::post('/medals/store', [MedalsController::class, 'store'])->name('medals.store');
    Route::get('/medals/{id}', [MedalsController::class, 'edit'])->name('medals.edit');
    Route::put('/medals/{id}', [MedalsController::class, 'update'])->name('medals.update');
    Route::delete('/medals/{id}', [MedalsController::class, 'destroy'])->name('medals.destroy');
    Route::post('/achievement/store', [AchieveMedalController::class, 'store'])->name('achieve.store');
    Route::get('/achievement/search', [AchieveMedalController::class, 'search'])->name('achieve.search');

    Route::get('/certificate', [CertificateController::class, 'index'])->name('piagam.index');

    Route::get('/location', [TempatLatihanController::class, 'index'])->name('location.index');
    Route::get('/location/{id}/edit', [TempatLatihanController::class, 'edit'])->name('location.edit');
    Route::put('/location/update/{id}', [TempatLatihanController::class, 'update'])->name('location.update');
    Route::post('/location/store', [TempatLatihanController::class, 'store'])->name('location.store');
    Route::delete('/location/destroy/{id}', [TempatLatihanController::class, 'destroy'])->name('location.destroy');


    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');

    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::post('/jadwal/generate', [JadwalController::class, 'generate'])->name('jadwal.generate');


});






// route auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// users route
Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('user.index');
    Route::get('/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::get('/{id}', [UsersController::class, 'show'])->name('user.show');
    Route::post('/', [UsersController::class, 'store']);
    Route::put('/{id}', [UsersController::class, 'update']);
    Route::delete('/{id}', [UsersController::class, 'destroy']);
});

Route::middleware('auth')->get('/dashboard', [UsersController::class, 'dashboard'])->name('dashboard.user');

// Route::get('/events', function () {
//     return response()->json([
//         ['id' => 1, 'title' => 'Latihan Pemula', 'start' => '2025-01-05', 'color' => '#3b82f6'], // Biru
//         ['id' => 2, 'title' => 'Latihan Lanjutan', 'start' => '2025-01-08', 'color' => '#22c55e'], // Hijau
//         ['id' => 3, 'title' => 'Latihan Kompetisi', 'start' => '2025-01-15', 'color' => '#ef4444'], // Merah
//         ['id' => 4, 'title' => 'Latihan Intensif', 'start' => '2025-01-20', 'color' => '#facc15'], // Kuning
//     ]);
// });




Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardUserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [DashboardUserController::class, 'profile'])->name('user.profile');
    Route::get('/scedule', [DashboardUserController::class, 'scedule'])->name('user.scedule');
    Route::get('/achieve', [DashboardUserController::class, 'achieve'])->name('user.achieve');
});


