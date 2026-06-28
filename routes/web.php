<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FakultasController;
use App\Http\Controllers\Admin\ProgramStudiController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\TahunAkademikController;
use App\Http\Controllers\Admin\JadwalController;

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [AdminDashboardController::class,'index']
        )->name('dashboard');

        Route::resource('users',UserController::class);

        Route::resource('fakultas',FakultasController::class);

        Route::resource('program-studi',ProgramStudiController::class);

        Route::resource('dosen',DosenController::class);

        Route::resource('mahasiswa',MahasiswaController::class);

        Route::resource('mata-kuliah',MataKuliahController::class);

        Route::resource('tahun-akademik',TahunAkademikController::class);

        Route::resource('jadwal',JadwalController::class);

});

Route::middleware(['auth','role:dosen'])
    ->prefix('dosen')
    ->name('dosen.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [DosenDashboardController::class,'index']
        )->name('dashboard');

});

Route::middleware(['auth','role:mahasiswa'])
    ->prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [MahasiswaDashboardController::class,'index']
        )->name('dashboard');

});