<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

// AUTHENTICATION
Route::get('/', [dashboardController::class, 'home']);
Route::get('/login', [dashboardController::class, 'loginpage'])->middleware('guest');
Route::post('/login', [dashboardController::class, 'login'])->middleware('guest');
Route::get('/dashboard/logout', [dashboardController::class, 'logout'])->middleware('auth');

//DASHBOARD
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');

//ROUTE CABANG LATIHAN
Route::prefix('dashboard/cabang-latihan')->middleware(['auth', 'adminaktif'])->group(function () {
    Route::get('/', [dashboardController::class, 'getcabanglatihan']);
    Route::get('/create', [dashboardController::class, 'createcabanglatihan']);
    Route::post('/store', [dashboardController::class, 'storecabanglatihan']);
    Route::get('/edit/{id}', [dashboardController::class, 'editcabanglatihan']);
    Route::post('/update/{id}', [dashboardController::class, 'updatecabanglatihan']);
    Route::get('/{id}', [dashboardController::class, 'showcabanglatihan']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deletecabanglatihan']);
});

//ROUTE TINGKATAN
Route::prefix('dashboard/tingkatan')->middleware(['auth', 'adminpimda'])->group(function () {
    Route::get('/', [dashboardController::class, 'gettingkatan']);
    Route::get('/create', [dashboardController::class, 'createtingkatan']);
    Route::post('/store', [dashboardController::class, 'storetingkatan']);
    Route::get('/edit/{id}', [dashboardController::class, 'edittingkatan']);
    Route::post('/update/{id}', [dashboardController::class, 'updatetingkatan']);
    Route::get('/{id}', [dashboardController::class, 'showtingkatan']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deletetingkatan']);
});

//ROUTE ANGGOTA
Route::prefix('dashboard/anggota')->middleware(['auth', 'adminaktif'])->group(function () {
    Route::get('/', [dashboardController::class, 'getanggota']);
    Route::get('/create', [dashboardController::class, 'createanggota']);
    Route::post('/store', [dashboardController::class, 'storeanggota']);
    Route::post('/update/{id}', [dashboardController::class, 'updateanggota']);
});

//ROUTE FILTER ANGGOTA
Route::prefix('dashboard/anggota')->middleware(['auth', 'adminpimda'])->group(function () {
    Route::get('/siswa', [dashboardController::class, 'siswa']);
    Route::get('/kader', [dashboardController::class, 'kader']);
    Route::get('/pendekar', [dashboardController::class, 'pendekar']);
});
Route::get('/dashboard/anggota/{id}', [dashboardController::class, 'showanggota'])->middleware('auth');
Route::delete('/dashboard/anggota/delete/{id}', [dashboardController::class, 'deleteanggota'])->middleware('auth');

//ROUTE RIWAYAT KADERISASI ANGGOTA
Route::prefix('dashboard/anggota/riwayat-kaderisasi')->middleware(['auth', 'adminpimda'])->group(function () {
    Route::post('/store', [dashboardController::class, 'storeriwayatkaderisasi']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deleteriwayatkaderisasi']);
});

// ROUTE HANYA BISA DI AKSES OLEH ADMIN PIMDA
// ROUTE ADMIN CABANG
Route::prefix('dashboard/admincabang')->middleware(['auth', 'adminpimda'])->group(function () {
    Route::get('/', [dashboardController::class, 'getadmincabang']);
    Route::get('/create', [dashboardController::class, 'createadmincabang']);
    Route::post('/store', [dashboardController::class, 'storeadmincabang']);
    Route::get('/edit/{id}', [dashboardController::class, 'editadmincabang']);
    Route::post('/update/{id}', [dashboardController::class, 'updateadmincabang']);
    Route::get('/{id}', [dashboardController::class, 'showadmincabang']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deleteadmincabang']);
    Route::get('/aktif/{id}', [dashboardController::class, 'aktifadmincabang']);
    Route::get('/nonaktif/{id}', [dashboardController::class, 'nonaktifadmincabang']);
});
