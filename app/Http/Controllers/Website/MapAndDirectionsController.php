<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MapAndDirectionsController extends Controller
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
		
		return view('website.map-and-directions.home', [
			'title' => 'Map & Directions',
			'category' => $category,
			'subcategory' => $subcategory,
			'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']]),
		]);
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
			
			$data = call_user_func($this->getModel().'::with', $relations)->where($filters)->get()->first();
			
		} else {
			
			$data = call_user_func($this->getModel().'::with', $relations)->get()->first();
			
		}
		
		return $data;
	}
	
	/** Returns the model used for getting the data
	 *
	 * @return String|null
	 */
	private function getModel() {
		return Zoo::class;
	}
	
	/** Returns the model used for getting the data
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(string $type) {
		switch ($type) {
			case 'zoos':
				return [];
			
			default: return [];
		}
	}
}
