<?php

namespace App\Http\Middleware;

use Closure;

class AllowPortalAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!\Gate::allows('portal-access')) 
        {
	        return redirect('/home');
        }
	    
	    return $next($request);
    }
}
