<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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

        if (! session()->has('user')) {
            session()->flash('error_message', 'Login terlebih dahulu');
            return redirect()->route('login');
        }

        return $next($request);
    }
}
