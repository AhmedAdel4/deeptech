<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiApplicationJsonHeaderMiddleware
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
        if ($request->is('api*')) {
            $request->headers->add([
                'Accept' => 'application/json'
            ]);
        }
        return $next($request);
    }
}
