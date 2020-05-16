<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:sponsor');
	}
	
	public function showLoginForm() {
		return view('auth.sponsor-auth');
	}
	
	public function login(Request $request) {
		$remember = $request->remember ?? false;
		
		// Validate request email and password
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		
		// Attempt to log the user in
		if (Auth::guard('user')->attempt([
			'email' => $request->email,
			'password' => $request->password
		], $remember)) {
			// If attempt successful then redirect to intended destination or by default to user/
			return redirect()->intended(route('sponsor.index'));
		}
		
		// If attempt unsuccessful then redirect to login
		return redirect()->back()->withInput($request->only('email', 'remember'));
	}
}
