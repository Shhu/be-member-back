<?php

namespace Bemember\Core\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
