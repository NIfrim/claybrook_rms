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
				if (Auth::guard($guard) -> check()) {
						switch ($guard) {
								case 'user':
										return redirect(RouteServiceProvider::USER_HOME);

								case 'sponsor':
										return redirect(RouteServiceProvider::SPONSOR_HOME);

								case 'admin':
										return redirect(RouteServiceProvider::ADMIN_HOME);

								default:
										return redirect(route('welcome')) -> with(['guard' => 'Guard: ' . $guard . '. Should not be null']);
						}
				}
		
				return $next($request);
		}
}
