<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('nama')) {
            return $next($request);
        }
        return redirect('login')->with('error', 'Anda harus login terlebih dahulu.');
    }
}
