<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimalsController extends Controller
{
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
	 * @param string|null $id
	 * @param object|null $rowData
	 * @param String $type [The type of animal, e.g. mammals, birds...]
	 * @param String $formType new|edit
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showAnimalForm(string $type, ?string $id)
	{
		$model = $this->getModel($type);
		$animalRecords = call_user_func($model.'::'.'with', ['location', 'educationalInfo', 'animalHabitat', 'sponsorshipBand', 'sponsorSignage'])->get();
		$sponsorshipBands = \App\Models\SponsorshipBand::all();
		$locations = \App\Models\Location::all();
		
		$data = [
			'id' => $this->generateId($type, $animalRecords),
			'type' => $type === 'fish' ? strtoupper('fish') : strtoupper(substr($type, 0, -1)),
			'species' =>  $this->getArrayFromRows($animalRecords, 'species'),
			'classifications' => $this->getArrayFromRows($animalRecords, 'classification'),
			'diet' => $this->getArrayFromRows($animalRecords, 'diet'),
			'sponsorshipBands' => $sponsorshipBands,
			'locations' => $locations
		];
		
		if ($id) {
			$data['currentRow'] = call_user_func($model.'::'.'with', ['location', 'educationalInfo', 'animalHabitat', 'sponsorshipBand', 'sponsorSignage'])->find($id);
		}
		
		// Add animal related data (assists with filling the form)
		switch ($type) {
			case 'birds':
				$data['nestConstruction'] = $this->getArrayFromRows($animalRecords, 'nest_construction');
				$data['clutchSize'] = $this->getArrayFromRows($animalRecords, 'clutch_size');
				$data['plumage'] = $this->getArrayFromRows($animalRecords, 'plumage');
				break;
			
			case 'fish':
					$data['water_type'] = $this->getArrayFromRows($animalRecords, 'water_type');
					$data['average_body_temperature'] = $this->getArrayFromRows($animalRecords, 'average_body_temperature');
					$data['colour'] = $this->getArrayFromRows($animalRecords, 'colour');

				break;
				
			case 'mammals':
					$data['gestational_period'] = $this->getArrayFromRows($animalRecords, 'gestational_period');
					$data['offspring_number'] = $this->getArrayFromRows($animalRecords, 'offspring_number');
				break;
			
			case 'reptiles':
					$data['clutch_size'] = $this->getArrayFromRows($animalRecords, 'clutch_size');
					$data['offspring_number'] = $this->getArrayFromRows($animalRecords, 'clutch_size');
				break;
				
			default:
				break;
		}
		
		return view('admin.animals.birds.forms', [
			'category' => 'animals',
			'subcategory' => $type,
			'formType' => $id ? 'edit' : 'new',
			'data' => $data,
		]);
	}
	
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param String $type [The type of animal, e.g. mammals, birds...]
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
				call_user_func($this->getModel($type).'::'.'create', $request->all());
				break;
				
			case 'edit':
				call_user_func($this->getModel($type).'::'.'find', $request->id)->update($request->all());
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.animals.byType', ['type'=> $type]));
	}
	
	/**
	 * Get the id template to be used when generating the id.
	 *
	 * @param string $type
	 *
	 * @param object $animalRecords
	 *
	 * @return string|null
	 */
	public function generateId(string $type, object $animalRecords) {
		/* Get all the ids currently in the relevant database table */
		$ids = array_map(function ($elem) {
			return $this->getNumberFromString($elem);
		}, $this->getArrayFromRows($animalRecords, 'id'));
		
		$lastIdAsInt = intval(end($ids));
		
		$generatedId = $this->getIdTemplate($type).sprintf('%05d', $lastIdAsInt + 1);
		
		return $generatedId;
	}
	
	/**
	 * Get the id template to be used when generating the id.
	 *
	 * @param string $category
	 *
	 * @return string|null
	 */
	private function getIdTemplate(string $category) {
		switch ($category){
			case 'birds':
				return 'BIR';
			case 'mammals':
				return 'MAM';
			case 'reptiles':
				return 'REP';
			case 'fish':
				return 'FIS';
			default: return null;
		}
	}
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param  array $data 		The data to be validated
	 * @param string $type 		The type of animal
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		$validationRules = [
			'id' => ['required', 'string', 'max:45'],
			'location_id' => ['required', 'string', 'max:45'],
			'species' => ['required', 'string', 'max:45'],
			'classification' => ['string', 'max:45'],
			'type' => ['required', 'string', 'in:BIRD,FISH,MAMMAL,REPTILE'],
			'name' => ['required', 'string', 'max:45'],
			'date_joined' => ['required', 'date'],
			'dob' => ['required', 'date'],
			'gender' => ['required', 'string', 'in:FEMALE,MALE'],
			'height_joined' => ['required', 'numeric'],
			'weight_joined' => ['required', 'numeric'],
		];
		
		switch ($data['type']) {
			case 'BIRD':
				$validationRules['nest_construction'] = ['string', 'max:45'];
				$validationRules['clutch_size'] = ['numeric'];
				$validationRules['wingspan'] = ['numeric'];
				break;
			
			case 'FISH':
				$validationRules['water_type'] = ['string', 'max:45'];
				$validationRules['average_body_temperature'] = ['numeric'];
				$validationRules['colour'] = ['string', 'max:45'];
				break;
			
			case 'MAMMAL':
				$validationRules['gestational_period'] = ['numeric'];
				$validationRules['offspring_number'] = ['numeric'];
				break;
			
			case 'REPTILE':
				$validationRules['reproduction_type'] = ['string', 'in:LIVEBEARER,EGGLAYER'];
				$validationRules['clutch_size'] = ['numeric'];
				$validationRules['offspring_number'] = ['numeric'];
				break;
			
			default: break;
		}
		
		return Validator::make($data, $validationRules);
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
