<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\Siswa;
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

// BAGIAN OTENTIFIKASI

Route::get('/', function(){
    return view('sign-in');
});

Route::get('login', function(){
    return view('sign-in');
})->name('login');

Route::get('login_adm', function(){
    return view('sign-in-adm');
})->name('login_adm');
Route::post('prosesLogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');

Route::post('prosesLoginAdm', [LoginController::class, 'prosesLoginAdm'])->name('prosesLoginAdm');

Route::get('logout', [LoginController::class, 'logout']);

//===================================================
//route::get('logout, [LoginController::class, 'logoutahdjas hari ini saya sedajngk])
Route::middleware(['role'])->group(function () {
    // BAGIAN BERANDA DAN MAINTENANCE

Route::get('beranda', function () {
    $data1=Guru::count();
    $data2=Siswa::count();
    $data3=Kelas::count();
    return view('beranda', ['data1'=>$data1, 'data2'=>$data2, 'data3'=>$data3]);
});

Route::get('beranda', function () {
    $data1=Guru::count();
    $data2=Siswa::count();
    $data3=Kelas::count();
    return view('beranda', ['data1'=>$data1, 'data2'=>$data2, 'data3'=>$data3]);
});

Route::get('main', function () {
    return view('main');
});

//===================================================

// BAGIAN DATA SISWA

Route::get('datasiswa', function () {
    $data=Siswa::all();
    $kelas=Kelas::all();
    return view('datasiswa', ['data'=>$data, 'kelas'=>$kelas]);
});

Route::post('tambahsiswa', [SiswaController::class, 'store']);

Route::delete('hapussiswa/{id}', [SiswaController::class, 'destroy'])->name('hapussiswa');

Route::put('updatesiswa/{id}', [SiswaController::class, 'update'])->name('updatesiswa');

//===================================================

// BAGIAN DATA GURU

Route::get('dataguru', [GuruController::class, 'index']);

Route::post('tambahguru', [GuruController::class, 'store']);

Route::delete('hapusguru/{id}', [GuruController::class, 'destroy'])->name('hapusguru');

Route::put('updateguru/{id}', [GuruController::class, 'update'])->name('updateguru');

//===================================================

// BAGIAN DATA KELAS

Route::get('datakelas', function () {
    $data=Kelas::all();
    return view('datakelas', ['data'=>$data]);
});

Route::post('tambahkelas', [KelasController::class, 'store']);

Route::delete('hapuskelas/{id}', [KelasController::class, 'destroy'])->name('hapuskelas');

//===================================================


// BAGIAN DATA TUGAS DAN PENGUMPULAN

Route::get('datatugas', [TugasController::class, 'in']);

Route::get('/tugas/{id_kelas}', [TugasController::class, 'index'])->name('tugas');

Route::post('tambahtugas/{id}', [TugasController::class, 'store'])->name('/tambahtugas');

Route::get('datapensis/{id}/{id_tugas}', [PengumpulanController::class, 'index'])->name('datapensis');

Route::put('/nilai/{id_siswa}/{id_kelas}/{id_tugas}', [PengumpulanController::class, 'update'])->name('/nilai');

//===================================================


//BAGIAN DATA MATERI

Route::get('datamateri', [MateriController::class, 'in']);

Route::post('tambahmateri/{id}', [MateriController::class, 'store'])->name('/tambahmateri');

Route::get('/materi/{id_kelas}', [MateriController::class, 'index'])->name('materi');


//===================================================

// BAGIAN RUANG AJAR

Route::get('dataruangajar', function () {
    $data=Ruang::all();
    $kelas=Kelas::all();
    $guru=Guru::all();
    return view('dataruangajar', ['data'=>$data, 'kelas'=>$kelas, 'guru'=>$guru]);
});

Route::post('tambahruang', [RuangController::class, 'store']);

Route::delete('hapusruang/{id}', [RuangController::class, 'destroy'])->name('hapusruang');

//===================================================

});

