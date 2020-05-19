<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BirdsController extends Controller
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
	 * Show all the birds records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$animalColumns = Schema::getColumnListing('animals');
		$birdColumns = Schema::getColumnListing('birds');
		$columns = array_unique(array_merge($animalColumns, $birdColumns));
		
		$rows = DB::table('birds')->join('animals', 'birds.animal_id', '=', 'animals.id')->get()->all();
		
		return view('admin.animals.birds.home', [
			'title' => 'Animals - Birds',
			'category' => 'animals',
			'subcategory' => 'birds',
			'columns' => $columns,
			'rows' => $rows
		]);
	}
	
	/**
	 * Show all the birds records.
	 *
	 * @param String $formType
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function showAnimalForm(String $formType)
	{
		return view('admin.animals.birds.forms', [
			'title' => 'Animals - Birds',
			'category' => 'animals',
			'subcategory' => 'birds',
			'formType' => $formType,
			'animalType' => 'bird'
		]);
	}
}
