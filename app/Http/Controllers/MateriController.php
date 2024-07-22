<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Ruang;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index(Request $request, $id_kelas)
    {
        $id_login = $request->session()->get('id');
    $role_login = $request->session()->get('role');
    $namakelas= Kelas::where('id', $id_kelas)->get();
    $mapel=Mapel::all();
        if ($role_login === 'guru') {
        $materi = Materi::where('id_kelas', $id_kelas)
                        ->where('id_guru', $id_login)
                        ->with('guru', 'mapel')
                        ->get();
        } else {
            $namakelas= Kelas::where('id', $id_kelas)->get();
        $materi = Materi::where('id_kelas', $id_kelas)
                        ->with('guru', 'mapel')
                        ->get();
        }
        return view('materi', compact('materi', 'namakelas', 'mapel'));
    }

    public function in(Request $request)
{
    $loggedInUserId = $request->session()->get('id');
    $loggedInUserRole = $request->session()->get('role');

    if ($loggedInUserRole === 'guru') {
        $kelas = Ruang::where('id_guru', $loggedInUserId)->with('kelas')->get();
    } else {
        $kelas = Kelas::get();
    }

    // Debugging: Output the retrieved data
    // dd($loggedInUserRole);

    return view('datamateri', compact('kelas'));
}

public function store(Request $request, $id)
    {
        $id_login = $request->session()->get('id');

        Materi::create([
            'id_kelas' => $id,
            'id_guru' => $id_login,
            'id_mapel' => $request->id_mapel,
            'materi' => $request->materi
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan.');
    }



}
