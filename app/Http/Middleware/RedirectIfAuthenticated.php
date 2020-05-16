<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
    	switch ($guard) {
			case 'user':
				if (Auth::guard('user')->check()) {
					return redirect('user.index');
				}
				break;
				
			case 'sponsor':
				if (Auth::guard('sponsor')->check()) {
					return redirect('sponsor.index');
				}
				break;
				
			case 'admin':
				if (Auth::guard('admin')->check()) {
					return redirect('admin.index');
				}
				break;
				
			default: break;
		}
		
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
