<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AttractionsController extends Controller
{
	/**
	 * Show the attractions main page, or selected one.
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(?string $id = null)
	{
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$category = $url[1];
		$subcategory = $url[2];

		if ($id) {
			
			$attraction = $this->getData('attractions', [['id', '=', $id]])->first();
			
			return view('website.attractions.single', [
				'title' => $attraction->name,
				'category' => $category,
				'subcategory' => $subcategory,
				'attraction' => $attraction,
				'zoo' => $this->getZoo(),
			]);
		
		} else {
			
			return view('website.attractions.home', [
				'title' => 'Attractions & Rides',
				'attractionsCategories' => $this->getData('attractions'),
				'category' => $category,
				'subcategory' => $subcategory,
				'zoo' => $this->getZoo(),
			]);
		}
	}
	
	/** Returns zoo information
	 */
	private function getZoo() {
		return ['name' => 'Claybrook Zoo', 'address' => ['building_number' => '45', 'road_name' => 'Zoo Lane', 'city' => 'Eastlands', 'county' => 'North Yorkshire', 'postcode' => 'YR123TH'], 'company_number' => 211545];
	}
	
	/** Returns list of data using specified table
	 *  Accepts filters as array ['attribute', 'comparator', 'value'];
	 *
	 * @param string $table
	 * @param array|null $filters
	 *
	 * @return Model
	 */
	private function getData(string $table, ?array $filters = null) {
		$relations = $this->getRelations($table);
		
		if ($filters) {
			
			$data = call_user_func($this->getModel().'::with', $relations)->where($filters)->get();
			
		} else {
			
			$data = call_user_func($this->getModel().'::with', $relations)->get()->groupBy('type');
			
		}
		
		return $data;
	}
	
	/** Returns the model used for getting the data
	 *
	 * @return String|null
	 */
	private function getModel() {
		return Attraction::class;
	}
	
	/** Returns the model used for getting the data
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(string $type) {
		switch ($type) {
			case 'attractions':
				return ['zoo'];
			
			default: return [];
		}
	}
}
