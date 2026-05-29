<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

Route::redirect('/', '/login');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

    
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/laporan/dashboard', [LaporanController::class, 'dashboard'])->name('laporan.dashboard');

    Route::resource('kelas', KelasController::class);
    Route::resource('murid', MuridController::class);
    Route::resource('pengajar', PengajarController::class);

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('daerah', DaerahController::class);
    Route::resource('masjid', MasjidController::class);
    Route::resource('user', UserController::class);

});

require __DIR__.'/auth.php';