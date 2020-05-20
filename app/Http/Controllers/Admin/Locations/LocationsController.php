<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Zoo;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
	public $category = 'locations', $subcategory, $title, $idTemplate;
	
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
	 * Show all the bird locations records.
	 *
	 */
	public function index()
	{
		// Override the function with own implementation
	}
	
	/**
	 * Show the form for creating/updating a location
	 *
	 * @param String $formType new|edit
	 *
	 */
	public function showLocationForm(String $formType)
	{
		// Override this function with own implementation
	}
	
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param Request $request
	 * @param String $formType
	 *
	 * @return \App\Models\Location
	 */
	protected function save(Request $request, String $formType)
	{
		/* Validate the request */
		$request->validate([
			'id' => ['required', 'string', 'max:45'],
			'zoo_id' => ['required', 'numeric'],
			'name' => ['required', 'string', 'max:45'],
			'type' => ['required', 'string', 'in:AVIARY,AQUARIUM,COMPOUND,HOTHOUSE'],
			'vacant' => ['required', 'string', 'in:Y,N'],
			'surface_area' => ['required', 'numeric', 'max:99999'],
			'description' => ['string'],
		]);
		
		/* Insert the data */
		Location::create([
			'id' => $request->id,
			'zoo_id' => $request->zoo_id,
			'name' => $request->name,
			'type' => $request->type,
			'vacant' => $request->vacant,
			'surface_area' => $request->surface_area,
			'description' => $request->description ?? '',
		]);
		
		/* Redirect back or to intended route */
		return redirect()
			->intended(route('admin.locations.'.strtolower($request->type)))
			->with('status','Successfully saved to database');
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
	 * Get the zoo attributes
	 *
	 * @param String $name
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	protected function getZoo(String $name) {
		return Zoo::all()->where('name', '=', $name)->first();
	}
}
