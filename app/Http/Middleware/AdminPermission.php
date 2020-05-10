<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermission
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
        if(auth()->user() && auth()->user()->account_type == 'admin' || auth()->user()->account_type == 'co-admin'){
            return $next($request);
        }else{
            return response('Unauthorized, Bad request.');
        }
    }
}
