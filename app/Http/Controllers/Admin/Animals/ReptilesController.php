<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReptilesController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	
	/**
	 * Show all the reptiles records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.animals.reptiles.home', ['title' => 'Animals - Reptiles', 'category' => 'animals', 'subcategory' => 'reptiles']);
	}
}
