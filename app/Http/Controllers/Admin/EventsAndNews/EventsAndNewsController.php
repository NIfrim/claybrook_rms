<?php

namespace App\Http\Controllers\Admin\EventsAndNews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsAndNewsController extends Controller
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
	 * Show all the events and news records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.eventsAndNews.home', ['title' => 'Events And News', 'category' => 'eventsAndNews', 'subcategory' => '']);
	}
}
