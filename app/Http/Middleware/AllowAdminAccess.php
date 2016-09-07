<?php

namespace App\Http\Middleware;

use Closure;

class AllowAdminAccess
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
        if (!\Gate::allows('admin-access')) 
        {
	        return redirect('/home');
        }
	    
	    return $next($request);
    }
}
