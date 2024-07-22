<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class KendaliPengumpulan extends Controller
{
    public function index(Request $request){
        if ($request->has('id_guru') && $request->has('id_kelas') && $request->has('id_tugas')) {
            $id_guru = $request->query('id_guru');
            $id_kelas = $request->query('id_kelas');
            $id_tugas = $request->query('id_tugas');
            // Memfilter data berdasarkan id_Guru dan id_kelas
            $data = Pengumpulan::where('id_Guru', $id_guru)
            ->where('id_kelas', $id_kelas)
            ->where('id_tugas', $id_tugas)
            ->with('guru', 'mapel', 'tugas', 'siswa')
            ->get();
        } else if ($request->has('id_kelas') && $request->has('id_siswa')) {
            // Jika hanya ada parameter id_kelas, ambil Pengumpulan berdasarkan id_kelas
            $id_kelas = $request->query('id_kelas');
            $id_siswa = $request->query('id_siswa');
            $data = Pengumpulan::where('id_kelas', $id_kelas)
            ->where('id_siswa', $id_siswa)
            ->with('guru', 'mapel', 'tugas', 'siswa')
            ->get();
        } else {
            // Jika tidak ada parameter id_guru dan id_kelas, ambil semua data
            $data = Pengumpulan::all();
        }
        // Pengumpulan::where('id_kelas', $id)
        //                      ->where('id_tugas', $id_tugas)
        //                      ->where('id_guru', $id_login)
        //                      ->with('guru', 'mapel', 'tugas', 'siswa')
        //                      ->get();
        return response()->json($data, 200);
    }
    public function store(Request $request){
        Pengumpulan::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id){
        $data=Pengumpulan::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    public function destroy($id){
        $data=Pengumpulan::find($id);
        $data->delete();
        return response()->json(null, 200);
    }

    // by hifny

    public function destroyByTask($id_tugas) {
        Pengumpulan::where('id_tugas', $id_tugas)->delete();
        return response()->json(null, 200);
    }
}
