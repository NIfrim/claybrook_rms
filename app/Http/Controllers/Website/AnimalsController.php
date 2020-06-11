<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;

class AnimalsController extends Controller
{
	/**
	 * Show the animals section based on specified type.
	 *
	 * @param String $type
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(String $type, ?string $id = null)
	{
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$category = $url[1];
		$subcategory = $url[2];
		
		if ($id) {
			
			return view('website.animals.single', [
				'title' => $this->getTitle($type),
				'category' => $category,
				'subcategory' => $subcategory,
				'animal' => $this->getData('animals', [['id', '=', $id]])->first(),
				'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])->first(),
			]);
			
		} else {
			
			return view('website.animals.home', [
				'title' => $this->getTitle($type),
				'category' => 'our-zoo',
				'subcategory' => $type,
				'animals' => $this->getData('animals', [['type', '=', $this->getType($type)]]),
				'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])->first(),
			]);
			
		}
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
			
			$data = call_user_func($this->getModel().'::with', $relations)->get();
			
		}
		
		return $data;
	}
	
	/** Returns the model used for getting the data
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getModel() {
		return Animal::class;
	}
	
	/** Returns the model used for getting the data
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(string $type) {
		switch ($type) {
			case 'birds':
			case 'fish':
			case 'mammals':
			case 'reptiles':
				return ['sponsor'];
				
			default: return [];
		}
	}
	
	/** Returns the type of the animal, as stored in the database
	 *
	 * @param String $type
	 *
	 * @return string
	 */
	private function getType(string $type) {
		switch ($type) {
			case 'birds':
				return 'BIRD';
			case 'fish':
				return 'FISH';
			case 'mammals':
				return 'MAMMAL';
			case 'reptiles':
				return 'REPTILE';
			
			default: return '';
		}
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
