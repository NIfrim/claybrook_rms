<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
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
			'zoo' => ['name' => 'Claybrook Zoo', 'address' => ['building_number' => '45', 'road_name' => 'Zoo Lane', 'city' => 'Eastlands', 'county' => 'North Yorkshire', 'postcode' => 'YR123TH'], 'company_number' => 211545],
		]);
	}
}
