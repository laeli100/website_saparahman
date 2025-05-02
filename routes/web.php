<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailEkskulRaportController;
use App\Http\Controllers\DetailNilaiRaportController;
use App\Http\Controllers\DetailRaportP5Controller;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HafalanInggrisController;
use App\Http\Controllers\HafalanSurahController;
use App\Http\Controllers\InggrisController;
use App\Http\Controllers\JenisKasusController;
use App\Http\Controllers\KalenderAkademikController;
use App\Http\Controllers\KandunganMadingController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KategoriMadingController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MadingController;
use App\Http\Controllers\MapelKelasController;
use App\Http\Controllers\MasterAsasController;
use App\Http\Controllers\MasterEkskulController;
use App\Http\Controllers\MasterMapelController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\RaportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SurahController;
use App\Models\KalenderAkademik;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('detail_ekskul_raport', DetailEkskulRaportController::class);//
Route::resource('guru', GuruController::class);//
// Route::resource('admin', AdminController::class);
Route::resource('jenis_kasus', JenisKasusController::class);//
Route::resource('kasus', KasusController::class);//
Route::resource('kelas', KelasController::class);//
Route::resource('mapel_kelas', MapelKelasController::class);//
Route::resource('master_mapel', MasterMapelController::class);//
Route::resource('master_ekskul', MasterEkskulController::class);//
//Route::resource('orangtua', OrangTuaController::class);
Route::resource('orangtua', OrangTuaController::class);
Route::resource('raport', RaportController::class);
Route::resource('detail-nilai-raport', DetailNilaiRaportController::class);
Route::resource('detail-raport-p5', DetailRaportP5Controller::class);
Route::resource('kalender_akademik', KalenderAkademikController::class);
Route::resource('santri', SantriController::class);//
Route::resource('peraturan', PeraturanController::class);
Route::resource('pengumuman', PengumumanController::class);
Route::resource('master-asas', MasterAsasController::class);
Route::resource('kategori-mading', KategoriMadingController::class);
Route::resource('mading', MadingController::class);
Route::resource('kandungan-mading', KandunganMadingController::class);
Route::resource('surah', SurahController::class);
Route::resource('hafalan-surah', HafalanSurahController::class);
Route::resource('inggris', InggrisController::class);
Route::resource('hafalan-inggris', HafalanInggrisController::class);