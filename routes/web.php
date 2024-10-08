<?php

use App\Http\Controllers\AdminDesaController;
use App\Http\Controllers\DesaWisataController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ApiAuthController;
use App\Http\Controllers\Web\ProfileUserController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\DestinasiController;
use App\Http\Controllers\AuthController;

Route::get('/', [DesaWisataController::class, 'showLanding']);
Route::get('/desa-wisata', [DesaWisataController::class, 'getDesa'])->name('desa-wisata.getDesa');
Route::get('/desa-wisata/{slug}', [DesaWisataController::class, 'showDesa'])->name('desa-wisata.showDesa');


// Route untuk case api 

// route auth
Route::get('/login', [ApiAuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ProfileUserController::class, 'logout'])->name('logout');


// route profile dashboard
Route::resource('profile', ProfileUserController::class)->except(['index']);
Route::get('profile', [ProfileUserController::class, 'index'])->name('profile.index')
    ->middleware('auth');


// route admin
Route::prefix('admin-web')->middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
//     Route::get('destinasi/create/{desa_id}', [DestinasiController::class, 'create'])->name('destinasi.create');
//     Route::post('/destinasi', [DestinasiController::class, 'store'])->name('destinasi.store');
//     Route::get('/destinasi/{id}/edit', [DestinasiController::class, 'edit'])->name('destinasi.edit');
//     Route::put('/destinasi/{id}', [DestinasiController::class, 'update'])->name('destinasi.update');
//     Route::delete('/destinasi/{id}', [DestinasiController::class, 'destroy'])->name('destinasi.destroy');
// });


// Route lokal 

Route::get('/formregister', [AuthController::class, 'formregister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/formlogin', [AuthController::class, 'formlogin']);
// Route::post('/login', [AuthController::class, 'login']);

Route::middleware('role:admin')->group(function () {
    Route::get('/admin-desa/{slug}', [AdminDesaController::class, 'showListDestinasi'])->name('admin-desa.showListDestinasi');
    Route::prefix('desa-wisata/{desaWisata}')->group(function () {
        Route::resource('destination', DestinasiWisataController::class)->except(['destroy', 'edit', 'update']);
        Route::delete('destination', [DestinasiWisataController::class, 'destroy'])->name('destination.destroy');
    });
    Route::get('destination/{destination}/edit', [DestinasiWisataController::class, 'edit'])->name('destination.edit');
    Route::put('destination/{destination}/update', [DestinasiWisataController::class, 'update'])->name('destination.update');
});

Route::middleware('role:super_admin')->group(function () {
    Route::resource('superadmin', SuperAdminController::class);
});
