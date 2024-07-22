<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ruang;
use Carbon\Carbon;

class TugasController extends Controller
{
    public function index(Request $request, $id_kelas)
    {
        $id_login = $request->session()->get('id');
        $role_login = $request->session()->get('role');

        $namakelas = Kelas::where('id', $id_kelas)->get();
        $mapel = Mapel::all();

        if ($role_login === 'guru') {
            // Fetch tasks for the logged-in teacher and specific class ID
            $tugas = Tugas::where('id_kelas', $id_kelas)
                          ->where('id_guru', $id_login)
                          ->with('guru', 'mapel', 'kelas')
                          ->get();
        } else {
            // Fetch tasks for the specific class ID
            $tugas = Tugas::where('id_kelas', $id_kelas)
                          ->with('guru', 'mapel', 'kelas')
                          ->get();
        }

        // Send data to the view
        return view('tugas', compact('tugas', 'namakelas', 'mapel'));
    }

    public function in(Request $request)
    {
        $id_login = $request->session()->get('id');
        $role_login = $request->session()->get('role');

        if ($role_login === 'guru') {
            // Get classes associated with the logged-in teacher
            $kelas = Ruang::where('id_guru', $id_login)->with('kelas')->get();
        } else {
            // Get all classes for admin
            $kelas = Kelas::with('ruang')->get();
        }

        return view('datatugas', compact('kelas'));
    }

    public function store(Request $request, $id)
    {
        $id_login = $request->session()->get('id');

        Tugas::create([
            'id_kelas' => $id,
            'id_guru' => $id_login,
            'id_mapel' => $request->id_mapel,
            'tanggal' => Carbon::today(),
            'tugas' => $request->tugas,
            'tenggat' => $request->tenggat
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan.');
    }
}
