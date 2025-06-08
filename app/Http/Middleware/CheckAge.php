<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $age = $request->query('age');

        if ($age <= 17) {
            return response('Maaf, umur Anda belum cukup untuk pendaftaran KTP');
        }

        return $next($request);
    }
}
