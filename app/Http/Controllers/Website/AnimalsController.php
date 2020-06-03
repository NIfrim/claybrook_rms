<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

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
		if ($id) {
			
			$animal = $this->getAnimals($type, $id);
			
			return view('website.animals.single', [
				'title' => $this->getTitle($type),
				'category' => 'our-zoo',
				'subcategory' => $type,
				'animal' => $animal,
				'zoo' => $this->getZoo(),
				'didYouKnowMessage' => $animal->did_you_know,
			]);
			
		} else {
			
			return view('website.animals.home', [
				'title' => $this->getTitle($type),
				'category' => 'our-zoo',
				'subcategory' => $type,
				'animals' => $this->getAnimals($type),
				'zoo' => $this->getZoo(),
				'didYouKnowMessage' => $this->getDidYouKnow($type),
			]);
			
		}
	}
	
	/** Returns zoo information
	 */
	private function getZoo() {
		return ['name' => 'Claybrook Zoo', 'address' => ['building_number' => '45', 'road_name' => 'Zoo Lane', 'city' => 'Eastlands', 'county' => 'North Yorkshire', 'postcode' => 'YR123TH'], 'company_number' => 211545];
	}
	
	/** Returns zoo information
	 *
	 * @param string $type
	 *
	 * @param string|null $id
	 *
	 * @return Animal
	 */
	private function getAnimals(string $type, ?string $id = null) {
		$relations = $this->getRelations($type);
		
		if ($id) {
			
			$animals = call_user_func($this->getModel().'::with', $relations)->find($id);
			
		} else {
			
			$animals = call_user_func($this->getModel().'::with', $relations)->where('type', '=', $this->getType($type))->get();
			
		}
		
		return $animals;
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
	
	/** Returns a message for the did you know row
	 *
	 * @param String $type
	 * @return String|null
	 */
	private function getDidYouKnow(String $type) {
		switch ($type) {
			case 'birds':
				return 'We have over 2000 species of birds along with one of the oldest bird specie named The Shoebill Stork. ';
			
			case 'fish':
				return 'Some interesting facts about fishes';
			
			case 'mammals':
				return 'Some interesting facts about mammals';
			
			case 'reptiles':
				return 'Some interesting facts about reptiles';
			
			default:
				return 'No interesting facts';
		}
	}
}
