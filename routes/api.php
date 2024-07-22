<?php

use App\Http\Controllers\KendaliGuru;
use App\Http\Controllers\KendaliKelas;
use App\Http\Controllers\KendaliMapel;
use App\Http\Controllers\KendaliMateri;
use App\Http\Controllers\KendaliPengumpulan;
use App\Http\Controllers\KendaliRuang;
use App\Http\Controllers\KendaliSiswa;
use App\Http\Controllers\KendaliTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/guru', KendaliGuru::class);
Route::apiResource('/kelas', KendaliKelas::class);
Route::apiResource('/mapel', KendaliMapel::class);
Route::apiResource('/materi', KendaliMateri::class);
Route::apiResource('/pengumpulan', KendaliPengumpulan::class);
Route::apiResource('/ruang', KendaliRuang::class);
Route::apiResource('/siswa', KendaliSiswa::class);
Route::apiResource('/tugas', KendaliTugas::class);

//  not  api  resource

Route::put('/siswa/{idSiswa}', [KendaliSiswa::class, 'update']);
Route::put('/pengumpulan/{id}', [KendaliPengumpulan::class, 'update']);
Route::delete('/pengumpulan/byTask/{id_tugas}', [KendaliPengumpulan::class, 'destroyByTask']);


