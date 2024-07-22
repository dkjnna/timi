<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pengumpulan;
use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    public function index(Request $request, $id, $id_tugas)
{
    $id_login = $request->session()->get('id');
    $role_login = $request->session()->get('role');

    $namakelas = Kelas::where('id', $id)->get();

    if ($role_login === 'guru') {
        $kumpul = Pengumpulan::where('id_kelas', $id)
                             ->where('id_tugas', $id_tugas)
                             ->where('id_guru', $id_login)
                             ->with('guru', 'mapel', 'tugas', 'siswa')
                             ->get();
    } else {
        $kumpul = Pengumpulan::where('id_kelas', $id)
                             ->where('id_tugas', $id_tugas)
                             ->with('guru', 'mapel', 'tugas', 'siswa')
                             ->get();
    }

    return view('datapensis', compact('kumpul', 'namakelas', 'id'));
}

public function update(Request $request, $id_siswa, $id_kelas, $id_tugas)
{
    $data = Pengumpulan::where('id_siswa', $id_siswa)
                        ->where('id_kelas', $id_kelas)
                        ->where('id_tugas', $id_tugas)
                        ->first();

    if ($data) {
        $data->update([
            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,
            'tanggal' => $request->tanggal,
            'jawaban' => $request->jawaban,
            'nilai' => $request->nilai,
            'status' => $request->status,
        ]);
    }

    return redirect()->back();
}

}
