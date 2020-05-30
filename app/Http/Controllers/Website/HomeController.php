<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		//
	}
	
	/**
	 * Show the animals section based on specified type.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show()
	{
		return view('website.welcome', [
			'title' => 'Welcome to Claybrook Zoo',
			'category' => 'home',
			'subcategory' => null,
		]);
	}
}
