<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AviaryController extends LocationsController
{
	public $subcategory = 'aviary';
	public $title = 'Locations - Aviary';
	public $idTemplate = 'BA';
	
	/**
	 * Show all the aviary locations records.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$locationColumns = Schema::getColumnListing('locations');
		
		$aviariesWithRelated = Location::with(['animals', 'zoo'])->where('location_type', '=', 'AVIARY')->get();
		
		return view('admin.locations.aviary.home', [
			'title' => $this->title,
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'columns' => $locationColumns,
			'aviariesWithRelated' => $aviariesWithRelated
		]);
	}
	
	/**
	 * Show the form for creating/updating a location
	 *
	 * @param String $formType new|edit
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function showLocationForm(String $formType)
	{
		$locations = DB::table('locations')->get()->all();
		
		$ids = array_map(function ($elem) {
			return $this->getNumberFromString($elem);
		}, $this->getArrayFromRows($locations, 'id'));
		
		return view('admin.locations.aviary.forms', [
			'idTemplate' => $this->idTemplate,
			'zooId' => $this->getZoo(env('APP_NAME'))->id,
			'title' => $this->title,
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'formType' => $formType,
			'ids' => empty($ids) ? [1] : $ids,
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
