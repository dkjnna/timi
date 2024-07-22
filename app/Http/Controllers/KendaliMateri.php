<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class KendaliMateri extends Controller
{
    public function index(Request $request){
        if ($request->has('id_guru') && $request->has('id_kelas')) {
            $id_guru = $request->query('id_guru');
            $id_kelas = $request->query('id_kelas');

            // Memfilter data berdasarkan id_Guru dan id_kelas
            $data = Materi::where('id_Guru', $id_guru)
            ->where('id_kelas', $id_kelas)
            ->with('guru', 'mapel', 'kelas')
            ->get();
        } else if ($request->has('id_kelas')) {
            $id_kelas = $request->query('id_kelas');
            // Jika tidak ada parameter id_guru dan id_kelas, ambil semua data
            $data = Materi::where('id_kelas', $id_kelas)
            ->with('guru', 'mapel', 'kelas')
            ->get();
        } else {
            $data = Materi::all();
        }
        return response()->json($data, 200);
    }
    public function store(Request $request){
        Materi::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id){
        $data=Materi::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    public function destroy($id){
        $data=Materi::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
