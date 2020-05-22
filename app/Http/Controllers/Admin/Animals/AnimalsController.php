<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AnimalsController extends Controller
{
	public $category = 'animals', $subcategory, $title, $idTemplate;
	
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	
	/**
	 * Show all the birds records.
	 *
	 * @param String $type
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function byType(String $type)
	{
		return view('admin.animals.home', [
			'title' => $this->getTitle($type),
			'category' => 'animals',
			'subcategory' => $type,
			'model' => $this->getModel($type),
			'relations' => ['location', 'educationalInfo', 'animalHabitat', 'sponsorshipBand', 'sponsorSignage'],
		]);
	}
	
	/**
	 * Show all the birds records.
	 *
	 * @param String $type
	 * @param String $formType new|edit
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showAnimalForm(String $type, String $formType)
	{
		$birds = DB::table('birds')->join('animals', 'birds.animal_id', '=', 'animals.id')->get()->all();
		
		$ids = array_map(function ($elem) {
			return $this->getNumberFromString($elem);
		}, $this->getArrayFromRows($birds, 'animal_id'));
		
		$species = $this->getArrayFromRows($birds, 'species');
		
		$classifications = $this->getArrayFromRows($birds, 'classification');
		
		return view('admin.animals.birds.forms', [
			'idTemplate' => $this->idTemplate,
			'title' => 'Animals - Birds',
			'category' => 'animals',
			'subcategory' => 'birds',
			'formType' => $formType,
			'ids' => empty($ids) ? [1] : $ids,
			'species' => $species,
			'classifications' => $classifications
		]);
	}
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param  array  $data
	 */
	protected function validator(array $data)
	{
		// Override this function with own implementation
	}
	
	/**
	 * Return only specific columns from rows.
	 *
	 * @param array $rows
	 * @param String $column
	 *
	 * @return array
	 */
	protected function getArrayFromRows(array $rows, String $column) {
		$arr = [];
		
		foreach ($rows as $row) {
			if ($row->$column) {
				array_push($arr, $row->$column);
			}
		}
		
		return $arr;
	}
	
	/**
	 * Return only specific columns from rows.
	 *
	 * @param String $str
	 *
	 * @return integer
	 */
	protected function getNumberFromString(String $str) {
		preg_match('!\d+!', $str, $matches);
		return $matches[0];
	}
	
	/**
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getModel(String $type) {
		switch ($type) {
			case 'birds':
				return 'App\Models\Bird';
			
			case 'fishes':
				return 'App\Models\Fish';
			
			case 'mammals':
				return 'App\Models\Mammal';
			
			case 'reptiles':
				return 'App\Models\Reptile';
			
			default:
				return null;
		}
	}
	
	/**
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getTitle(String $type) {
		switch ($type) {
			case 'birds':
				return 'Animals - Birds';
			
			case 'fishes':
				return 'Animals - Fishes';
			
			case 'mammals':
				return 'Animals - Mammals';
			
			case 'reptiles':
				return 'Animals - Reptiles';
			
			default:
				return 'Missing title';
		}
	}
}
