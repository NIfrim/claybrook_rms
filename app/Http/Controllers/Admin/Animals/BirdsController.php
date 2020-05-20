<?php

namespace App\Http\Controllers\Admin\Animals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class BirdsController extends AnimalsController
{
	public $title = 'Animals - Birds';
	public $subcategory = 'birds';
	public $idTemplate = 'BIR';
	
	/**
	 * Show all the birds records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$animalColumns = Schema::getColumnListing('animals');
		$birdColumns = Schema::getColumnListing('birds');
		$columns = array_unique(array_merge($animalColumns, $birdColumns));
		
		$birds = DB::table('birds')->join('animals', 'birds.animal_id', '=', 'animals.id')->get()->all();
		
		return view('admin.animals.birds.home', [
			'title' => $this->title,
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'columns' => $columns,
			'birds' => $birds
		]);
	}
	
	/**
	 * Show all the birds records.
	 *
	 * @param String $formType new|edit
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function showAnimalForm(String $formType)
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
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, []);
	}
}
