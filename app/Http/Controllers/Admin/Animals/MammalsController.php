<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MammalsController extends Controller
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
	 * Show all the mammals records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.animals.mammals.home', ['title' => 'Animals - Mammals', 'category' => 'animals', 'subcategory' => 'mammals']);
	}
}
