<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KendaliKelas extends Controller
{
    public function index(Request $request){
        if ($request->has('id')) {
            $id = $request->query('id');
            // Memfilter data berdasarkan id_kelas
            $data = Kelas::where('id', $id)->get();
        } else {
            // Jika tidak ada parameter id, ambil semua data
            $data = Kelas::all();
        }
        return response()->json($data, 200);
    }

    public function store(Request $request){
        Kelas::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id){
        $data=Kelas::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    public function destroy($id){
        $data=Kelas::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
