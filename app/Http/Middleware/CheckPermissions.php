<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckPermissions
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
    	$urlSegments = explode('/', $request->url());
    	$categoryIndex = array_search('admin', $urlSegments) + 1;
    	$category = $urlSegments[$categoryIndex];
    	$userPermissions = Auth::guard('admin')->user()->accountType->permissions;
    	
    	if (in_array('READ', $userPermissions[$category]) || in_array('WRITE', $userPermissions[$category])) {
    	
			return $next($request);
			
		} else {
    		
    		abort(401);
    		
		}
    }
}
