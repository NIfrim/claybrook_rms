<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
	 * Show all the birds records.
	 *
	 * @param String $type [The type of location, e.g. aviary, aquarium...]
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, ?string $id)
	{
		$model = 'App\Models\Location';
		$relations = $this->getRelations();
		
		$locationRecords = call_user_func($model.'::'.'with', $relations)->get();
		
		$data = [
			'type' => strtoupper($type),
		];
		
		if ($id !== 'new') {
			
			$data['currentRow'] = call_user_func($model.'::'.'with', $relations)->find($id);
			
		} else {
			
			$data['generatedId'] = $this->generateId($type, $locationRecords);
			$data['zooId'] = 1;
			
		}
		
		return view('admin.locations.forms', [
			'category' => 'locations',
			'subcategory' => $type,
			'formType' => $id === 'new' ? 'new' : 'edit',
			'data' => $data,
		]);
	}
	
	/**
	 * Show all the birds records.
	 *
	 * @param String $type
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list(String $type)
	{
		return view('admin.locations.home', [
			'title' => $this->getTitle($type),
			'category' => 'locations',
			'subcategory' => $type,
			'model' => 'App\Models\Location',
			'relations' => $this->getRelations(),
		]);
	}
	
	/**
	 * Delete one of more locations from the database
	 *
	 * @param Request $request
	 * @param string $type
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete(Request $request, string $type)
	{
		// Convert to array to me able to use method to remove one or more rows
		$ids = explode(',', $request->ids);
		
		$successAlert = sizeof($ids) > 1 ? 'Multiple records deleted successfully' : 'One record deleted successfully';
		
		// Remove the records from the database using destroy()
		call_user_func('App\Models\Location::destroy', $ids);
		
		// Return the user to the table list
		return redirect(route('admin.locations.list', ['type' => $type]))->with('success', $successAlert);
	}
	
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param String $type [The type of location, e.g. aviary, aquarium...]
	 * @param String $formType new|edit
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function submit(Request $request, string $type, string $formType) {
		// Validate the form data
		$this->validator($request->all())->validate();
		
		// Create new or update record
		switch ($formType) {
			case 'new':
				call_user_func('App\Models\Location::create', $request->all());
				break;
			
			case 'edit':
				call_user_func('App\Models\Location::find', $request->id)->update($request->all());
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.locations.list', ['type'=> $type]));
	}
	
	/** Get the title to be displayed at the top of the section
	 *
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getTitle(String $type) {
		switch ($type) {
			case 'aquarium':
				return 'Locations - Aquarium';
			
			case 'aviary':
				return 'Locations - Aviary';
			
			case 'compound':
				return 'Locations - Compound';
			
			case 'hothouse':
				return 'Locations - Hothouse';
			
			default:
				return 'Missing title';
		}
	}
	
	/**
	 * Get the id template to be used when generating the id.
	 *
	 * @param string $type
	 *
	 * @param object $locationRecords
	 *
	 * @return string|null
	 */
	public function generateId(string $type, object $locationRecords) {
		/* Get all the ids currently in the relevant database table */
		$ids = array_map(function ($elem) {
			return $this->getNumberFromString($elem);
		}, $this->getArrayFromRows($locationRecords, 'id'));
		
		// Get the value of the last id
		$lastIdAsInt = intval(end($ids));
		
		// Generate id using template and last id value
		$generatedId = $this->getIdTemplate($type).sprintf('%02d', $lastIdAsInt + 1);
		
		return $generatedId;
	}
	
	/**
	 * Get the id template to be used when generating the id.
	 *
	 * @param string $type
	 *
	 * @return string|null
	 */
	private function getIdTemplate(string $type) {
		switch ($type){
			case 'aviary':
				return 'BA';
			case 'aquarium':
				return 'FA';
			case 'compound':
				return 'MA';
			case 'hothouse':
				return 'RA';
			default: return null;
		}
	}
	
	/**
	 * Get the relations based on the type of the location
	 *
	 * @return array
	 */
	private function getRelations() {
		return ['zoo', 'animals'];
	}
	
	
	/**
	 * Return array with specific data based on column.
	 *
	 * @param object $rows
	 * @param String $column
	 *
	 * @return array
	 */
	protected function getArrayFromRows(object $rows, String $column) {
		$arr = [];
		
		foreach ($rows as $row) {
			if ($row->$column && !in_array($row->$column, $arr)) {
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
		// d+ matches series of digits
		preg_match('!\d+!', $str, $matches);
		return $matches[0];
	}
	
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param  array $data 		The data to be validated
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		$validationRules = [
			'id' => ['required', 'string', 'max:45'],
			'zoo_id' => ['required', 'numeric'],
			'location_name' => ['required', 'string', 'max:45'],
			'location_type' => ['required', 'string', 'in:AVIARY,AQUARIUM,COMPOUND,HOTHOUSE'],
			'vacant' => ['required', 'string', 'max:1'],
			'surface_area' => [$data['surface_area'] !== '' ? 'numeric' : ''],
			'location_description' => [isset($data['location_description']) ? 'string' : ''],
		];
		
		return Validator::make($data, $validationRules);
	}
}
