<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckHRQuery
{
    public function handle(Request $request, Closure $next)
    {
        $role = $request->query('role');

        if ($role !== 'hr') {
            return response('Maaf, hanya HR yang dapat mengubah data Jadwal Kerja.', 403);
        }

        return $next($request);
    }
}
