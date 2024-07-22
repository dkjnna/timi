<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function store(Request $request){
        Ruang::create([
            'id_kelas'=>$request->id_kelas,
            'id_guru'=>$request->id_guru
        ]);

        return redirect('dataruangajar');
    }
    public function destroy($id){
        $data= Ruang::find($id);
        $data->delete();
        return redirect('dataruangajar');
    }
}
