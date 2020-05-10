<?php

namespace App\Http\Middleware;

use Closure;

class BuyerPermission
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
        if(auth()->user() && auth()->user()->account_type == 'buyer'){
            return $next($request);
        }else{
            return response('Unauthorized, Bad request.');
        }
    }
}
