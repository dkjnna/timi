<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{

    public function store(Request $request){
        Kelas::create([
            'nama_kelas'=>$request->nama_kelas
        ]);

        return redirect('datakelas');
    }
    public function destroy($id){
        $data= Kelas::find($id);
        $data->delete();
        return redirect('datakelas');
    }
}
