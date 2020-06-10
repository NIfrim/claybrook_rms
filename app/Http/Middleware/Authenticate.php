<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
		/**
		 * Get the path the user should be redirected to when they are not authenticated.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param array $guards
		 *
		 * @return string|null
		 */
    protected function redirectTo($request)
    {
    		switch ($request->path()) {
				case 'user':
						$routeName = 'website.user.auth.show';
						break;
		
				case 'sponsor':
						$routeName = 'website.sponsor.auth.show';
						break;
	
				case 'admin':
					$routeName = 'admin.login';
					break;
					
				default: $routeName = 'website.welcome';
			}
    		
        if (! $request->expectsJson()) {
            return route($routeName);
        }
    }
}
