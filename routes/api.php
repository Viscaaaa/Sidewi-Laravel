<?php

use App\Http\Controllers\api\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\DesaWisataController;
use App\Http\Controllers\api\DestinasiWisataController;
use App\Models\DestinasiWisata;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::middleware('web')->post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum', 'role:super_admin')->group(function () {
    Route::resource('admins', AdminController::class);
});

Route::middleware('auth:sanctum', 'role:admin|super_admin')->group(function () {
    Route::resource('desaWisata', DesaWisataController::class);
    Route::resource('destinasi', DestinasiWisataController::class);
    Route::get('/desa-wisata/akun/{akunId}', [DesaWisataController::class, 'desaWisataByAkunId']);
});
