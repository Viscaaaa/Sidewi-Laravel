<?php

use App\Http\Controllers\DesaWisataController;
use App\Http\Controllers\DestinasiWisataController;
use Illuminate\Support\Facades\Route;

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
Route::get('/desa-wisata/{slug}', [DesaWisataController::class, 'showDesa'])->name('desa-wisata.show');
