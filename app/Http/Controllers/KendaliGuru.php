<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class KendaliGuru extends Controller
{
    public function index(Request $request){
        if ($request->has('id')) {
            $id = $request->query('id');
            // Memfilter data berdasarkan id_Guru
            $data = Guru::where('id', $id)->get();
        } else {
            // Jika tidak ada parameter id, ambil semua data
            $data = Guru::all();
        }
        return response()->json($data, 200);
    }
    public function store(Request $request){
        Guru::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id){
        $data=Guru::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    public function destroy($id){
        $data=Guru::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
