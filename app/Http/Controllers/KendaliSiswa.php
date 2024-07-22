<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class KendaliSiswa extends Controller
{
    public function index(Request $request){
        if ($request->has('id')) {
            $id = $request->query('id');
            // Memfilter data berdasarkan id_Guru
            $data = Siswa::where('id', $id)
            ->with('guru', 'mapel', 'kelas')
            ->get();
        } else {
            // Jika tidak ada parameter id, ambil semua data
            $data = Siswa::all();
        }
        return response()->json($data, 200);
    }
    public function store(Request $request){
        Siswa::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id){
        $data=Siswa::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    public function destroy($id){
        $data=Siswa::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
