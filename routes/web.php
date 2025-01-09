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
Route::prefix('dashboard/cabang-latihan')->middleware(['auth', 'adminpimda'])->group(function() {
    Route::get('/', [dashboardController::class, 'getcabanglatihan']);
    Route::get('/create', [dashboardController::class, 'createcabanglatihan']);
    Route::post('/store', [dashboardController::class, 'storecabanglatihan']);
    Route::get('/edit/{id}', [dashboardController::class, 'editcabanglatihan']);
    Route::post('/update/{id}', [dashboardController::class, 'updatecabanglatihan']);
    Route::get('/{id}', [dashboardController::class, 'showcabanglatihan']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deletecabanglatihan']);
});

//ROUTE TINGKATAN
Route::prefix('dashboard/tingkatan')->middleware(['auth', 'adminpimda'])->group(function() {
    Route::get('/', [dashboardController::class, 'gettingkatan']);
    Route::get('/create', [dashboardController::class, 'createtingkatan']);
    Route::post('/store', [dashboardController::class, 'storetingkatan']);
    Route::get('/edit/{id}', [dashboardController::class, 'edittingkatan']);
    Route::post('/update/{id}', [dashboardController::class, 'updatetingkatan']);
    Route::get('/{id}', [dashboardController::class, 'showtingkatan']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deletetingkatan']);
});

//ROUTE ANGGOTA
Route::prefix('dashboard/anggota')->middleware('auth')->group(function() {
    Route::get('/', [dashboardController::class, 'getanggota']);
    Route::get('/create', [dashboardController::class, 'createanggota']);
    Route::post('/store', [dashboardController::class, 'storeanggota']);
    Route::post('/update/{id}', [dashboardController::class, 'updateanggota']);
});

//FILTER ANGGOTA
Route::prefix('dashboard/anggota')->middleware(['auth', 'adminpimda'])->group(function() {
    Route::get('/siswa', [dashboardController::class, 'siswa']);
    Route::get('/kader', [dashboardController::class, 'kader']);
    Route::get('/pendekar', [dashboardController::class, 'pendekar']);
});
Route::get('/dashboard/anggota/{id}', [dashboardController::class, 'showanggota'])->middleware('auth');
Route::delete('/dashboard/anggota/delete/{id}', [dashboardController::class, 'deleteanggota'])->middleware('auth');

//RIWAYAT KADERISASI ANGGOTA
Route::prefix('dashboard/anggota/riwayat-kaderisasi')->middleware(['auth', 'adminpimda'])->group(function() {
    Route::post('/store', [dashboardController::class, 'storeriwayatkaderisasi']);
    Route::delete('/delete/{id}', [dashboardController::class, 'deleteriwayatkaderisasi']);
});




