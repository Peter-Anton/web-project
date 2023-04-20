<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->name !== 'peter anton naguib')
        {
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
