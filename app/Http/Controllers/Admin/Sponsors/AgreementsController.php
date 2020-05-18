<?php

namespace App\Http\Controllers\Admin\Sponsors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgreementsController extends Controller
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
	 * View and manage all the sponsors agreements records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.sponsors.agreements.home', ['title' => 'Sponsors - Agreements', 'category' => 'sponsors', 'subcategory' => 'agreements']);
	}
}
