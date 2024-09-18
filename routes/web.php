<?php

use App\Http\Controllers\AdminDesaController;
use App\Http\Controllers\DesaWisataController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ProfileUserController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\DestinasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DesaWisataController::class, 'showLanding']);

Route::get('/desa-wisata', [DesaWisataController::class, 'getDesa'])->name('desa-wisata.getDesa');
Route::get('/desa-wisata/{slug}', [DesaWisataController::class, 'showDesa'])->name('desa-wisata.showDesa');


// Route biasa 
// Route::get('/formregister', [AuthController::class, 'formregister']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/formlogin', [AuthController::class, 'formlogin']);
// Route::post('/login', [AuthController::class, 'login']);


// Route baru untuk mencoba api

// route auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [ProfileUserController::class, 'logout'])->name('logout');


// route profile dashboard
Route::resource('profile', ProfileUserController::class)
    ->middleware('auth');


// route admin
// Route::middleware(['auth', 'role:super_admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });


Route::prefix('admin')->middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});


Route::prefix('destinasi')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DestinasiController::class, 'index'])->name('destinasi.dashboard');
});




// route lama
Route::middleware('role:admin')->group(function () {
    Route::get('/admin-desa/{id}', [AdminDesaController::class, 'showListDestinasi'])->name('admin-desa.showListDestinasi');
    Route::prefix('desa-wisata/{desaWisata}')->group(function () {
        Route::resource('destination', DestinasiWisataController::class)->except(['destroy']);
        Route::delete('destination', [DestinasiWisataController::class, 'destroy'])->name('destination.destroy');
    });
});


Route::middleware('role:super_admin')->group(function () {
    Route::resource('superadmin', SuperAdminController::class);
});
