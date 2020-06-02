<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalsController extends Controller
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
	 * @param String $type
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(String $type)
	{
		return view('website.animals.home', [
			'title' => $this->getTitle($type),
			'category' => 'our-zoo',
			'subcategory' => $type,
			'model' => $this->getModel(),
			'relations' => ['location', 'educationalInfo', 'animalHabitat', 'sponsorshipBand', 'sponsorSignage'],
			'zoo' => ['name' => 'Claybrook Zoo', 'address' => ['building_number' => '45', 'road_name' => 'Zoo Lane', 'city' => 'Eastlands', 'county' => 'North Yorkshire', 'postcode' => 'YR123TH'], 'company_number' => 211545],
		]);
	}
	
	/** Returns the model used for getting the data
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getModel() {
		return 'App\Models\Animal';
	}
	
	/** Returns a preset title used as the section title
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getTitle(String $type) {
		switch ($type) {
			case 'birds':
				return 'Our - Birds';
			
			case 'fish':
				return 'Our - Fishes';
			
			case 'mammals':
				return 'Our - Mammals';
			
			case 'reptiles':
				return 'Our - Reptiles';
			
			default:
				return 'Missing title';
		}
	}
}
