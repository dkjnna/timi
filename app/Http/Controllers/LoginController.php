<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function prosesLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;


        $guru = Guru::where('email', $email)->first();
        if ($guru) {
            if ($password == $guru->password || Hash::check($password, $guru->password)) {
                $request->session()->put('nama', $guru->nama);
                $request->session()->put('role', 'guru');
            $request->session()->put('id', $guru->id); // Menyimpan ID guru
                return redirect('beranda');
            } else {
                // Jika password tidak cocok, kembali ke halaman login dengan pesan error
                return redirect()->back()->with('error', 'Password yang Anda masukkan salah.');
            }
        } else {
            // Jika email tidak ditemukan, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Alamat email tidak ditemukan.');
        }
    }

    public function prosesLoginAdm(Request $request)
    {
        $email = $request->email;
        $password = $request->password;


        $adm = User::where('email', $email)->first();
        if ($adm) {
            if ($password == $adm->password || Hash::check($password, $adm->password)) {
                $request->session()->put('nama', $adm->name);
            $request->session()->put('role', 'admin');
                return redirect('beranda');
            } else {
                // Jika password tidak cocok, kembali ke halaman login dengan pesan error
                return redirect()->back()->with('error', 'Password yang Anda masukkan salah.');
            }
        } else {
            // Jika email tidak ditemukan, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Alamat email tidak ditemukan.');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('nama');
        return redirect('login');
    }
}

