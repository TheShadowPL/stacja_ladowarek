<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->permission === 'user') {
            return $next($request);
        }

        abort(403, 'Brak dostępu.');
    }
}
