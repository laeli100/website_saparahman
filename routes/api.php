<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailEkskulRaportController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JenisKasusController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelKelasController;
use App\Http\Controllers\MasterEkskulController;
use App\Http\Controllers\MasterMapelController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\OrtuSantriController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\SantriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('santri', SantriController::class); 
// Route::apiResource('orang_tua', OrangTuaController::class);
// Route::apiResource('ortu_santri', OrtuSantriController::class);
// Route::apiResource('guru', GuruController::class);
// Route::apiResource('admin', AdminController::class);
// Route::apiResource('kasus', KasusController::class);
// Route::apiResource('jenis_kasus', JenisKasusController::class);
// Route::apiResource('kelas', KelasController::class);
// Route::apiResource('master_mapel', MasterMapelController::class);
// Route::apiResource('mapel_kelas', MapelKelasController::class);
// Route::apiResource('master_ekskul', MasterEkskulController::class);
// Route::apiResource('detail_ekskul_raport', DetailEkskulRaportController::class);
// Route::apiResource('raport', RaportController::class);
