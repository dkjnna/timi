<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request)
    {
    $loggedInUserId = $request->session()->get('id');
    $loggedInUserRole = $request->session()->get('role');

    // Periksa apakah pengguna yang masuk adalah guru
    if ($loggedInUserRole === 'guru') {
        // Ambil data hanya untuk guru yang sedang login
        $data = Guru::where('id', $loggedInUserId)->get();
    } else {
        // Ambil semua data untuk admin
        $data = Guru::all();
    }
    return view('dataguru', ['data'=>$data]);
}


    public function store(Request $request){
        Guru::create([
            'nama'=>$request->nama,
            'kode'=>$request->kode,
            'email'=>$request->email,
            'notlp'=>$request->nomor,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('dataguru');
    }

    public function update(Request $request, $id){
        $data= Guru::find($id);
        $data->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'email' => $request->email,
            'notlp' => $request->nomor, // Menetapkan nilai notlp dari request
            'password' => Hash::make($request->password)
        ]);
        return redirect('dataguru');
    }


    public function destroy($id){
        $data= Guru::find($id);
        $data->delete();
        return redirect('dataguru');
    }
}
