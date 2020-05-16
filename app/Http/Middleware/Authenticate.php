<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
//    /**
//     * Get the path the user should be redirected to when they are not authenticated.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return string|null
//     */
//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
//    }
    
    protected function unauthenticated($request, array $guards)
	{
		switch ($guards[0]) {
			case 'user':
				$login = 'user.auth.show';
				break;
			
			case 'sponsor':
				$login = 'sponsor.auth.show';
				break;
			
			case 'admin':
				$login = 'admin.auth.show';
				break;
			
			default:
				$login = 'user.auth.show';
				break;
		}
		
		if ($request -> expectsJson()) {
			return response()->json(['error' => 'Unauthenticated'], 401);
		}
		
		return redirect() -> guest(route($login));
	}
}
