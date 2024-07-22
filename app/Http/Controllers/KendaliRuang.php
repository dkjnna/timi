<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class KendaliRuang extends Controller
{
    public function index(Request $request) {
        // Periksa apakah ada parameter id_guru dalam request
        if ($request->has('id_guru')) {
            $id_guru = $request->query('id_guru');
            // Memfilter data berdasarkan id_guru
            $data = Ruang::where('id_guru', $id_guru)->get();
        } else {
            // Jika tidak ada parameter id_guru, ambil semua data
            $data = Ruang::all();
        }

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        Ruang::create($request->all());
        return response()->json(200);
    }

    public function update(Request $request, $id) {
        $data = Ruang::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function destroy($id) {
        $data = Ruang::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
