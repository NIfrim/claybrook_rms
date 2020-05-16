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
								$routeName = 'user.login.show';
								break;
				
						case 'sponsor':
								$routeName = 'sponsor.login.show';
								break;
								
						default: $routeName = 'welcome';
				}
    		
        if (! $request->expectsJson()) {
            return route($routeName);
        }
    }
}
