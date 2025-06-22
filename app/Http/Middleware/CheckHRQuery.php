<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckHRQuery
{
    public function handle(Request $request, Closure $next)
{
    // Izinkan SEMUA akses GET (index, show) meskipun bukan HR
    if ($request->isMethod('get')) {
        return $next($request);
    }

    // Hanya blokir POST/PUT/DELETE untuk non-HR
    if (!auth()->check() || auth()->user()->role !== 'hr') {
        return response('Hanya HR yang dapat mengubah data Jadwal Kerja', 403);
    }
    
    return $next($request);
}
}
