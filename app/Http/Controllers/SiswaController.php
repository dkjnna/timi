<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function store(Request $request){
        Siswa::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'notlp'=>$request->no_telepon,
            'id_kelas'=>$request->id_kelas,
            'absen'=>$request->no_absen,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('datasiswa');
    }

    public function update(Request $request, $id){
        $data= Siswa::find($id);
        $data->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'notlp'=>$request->no_telepon,
            'id_kelas'=>$request->id_kelas,
            'absen'=>$request->no_absen,
            'password'=>Hash::make($request->password)
        ]);
        return redirect('datasiswa');
    }

    public function destroy($id){
        $data= Siswa::find($id);
        $data->delete();
        return redirect('datasiswa');
    }
}
