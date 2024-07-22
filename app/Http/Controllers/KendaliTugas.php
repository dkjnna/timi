<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class KendaliTugas extends Controller
{
    public function index(Request $request){
        if ($request->has('id_guru') && $request->has('id_kelas')) {
            $id_guru = $request->query('id_guru');
            $id_kelas = $request->query('id_kelas');

            // Memfilter data berdasarkan id_Guru dan id_kelas
            $data = Tugas::where('id_Guru', $id_guru)
            ->where('id_kelas', $id_kelas)
            ->with('guru', 'mapel', 'kelas')
            ->get();
        } else if ($request->has('id_kelas')) {
            $id_kelas = $request->query('id_kelas');
            $data = Tugas::where('id_kelas', $id_kelas)
            ->with('guru', 'mapel', 'kelas')
            ->get();
        } else {
            $data = Tugas::all();
        }
        return response()->json($data, 200);
    }


    public function store(Request $request){
        Tugas::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id) {
        try {
            // Mencari data berdasarkan id
            $data = Tugas::findOrFail($id); // Menggunakan findOrFail agar langsung menangani jika data tidak ditemukan

            // Mengupdate data
            $data->update($request->all());

            // Mengembalikan respons sukses
            return response()->json($data, 200);
        } catch (\Exception $e) {
            // Menangani kesalahan dan mengembalikan respons gagal
            return response()->json(['error' => 'Terjadi kesalahan saat mengupdate data', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id){
        $data=Tugas::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
