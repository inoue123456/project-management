<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->isEmployee()){
            abort(404);
        }
        return $next($request);
    }
}
