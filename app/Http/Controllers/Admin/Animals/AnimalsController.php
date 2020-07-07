<?php

namespace App\Http\Controllers\Admin\Animals;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AnimalImage;
use App\Models\AnimalMedicalHistory;
use App\Models\AnimalWatchlistHistory;
use App\Models\Location;
use App\Models\SponsorshipBand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
	public function list(String $type)
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
	 * @param String $type [The type of animal, e.g. mammals, birds...]
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, ?string $id)
	{
		$model = $this->getModel($type);
		$animalRecords = call_user_func($model.'::'.'with', ['location', 'educationalInfo', 'animalHabitat', 'sponsorshipBand', 'sponsorSignage'])->get();
		$sponsorshipBands = SponsorshipBand::all();
		$locations = Location::all();
		
		$data = [
			'type' => $type === 'fishes' ? strtoupper('fish') : strtoupper(substr($type, 0, -1)),
			'species' =>  $this->getArrayFromRows($animalRecords, 'species'),
			'classifications' => $this->getArrayFromRows($animalRecords, 'classification'),
			'diet' => $this->getArrayFromRows($animalRecords, 'diet'),
			'sponsorshipBands' => $sponsorshipBands,
			'locations' => $locations
		];
		
		if ($id !== 'new') {
			$data['currentRow'] = call_user_func($model.'::'.'with', ['location', 'educationalInfo', 'animalHabitat', 'sponsorshipBand', 'sponsorSignage', 'medicalHistory'])->find($id);
		} else {
			$data['generatedId'] = $this->generateId($type, $animalRecords);
		}
		
		// Add animal related data (assists with filling the form)
		switch ($type) {
			case 'birds':
				$data['nestConstruction'] = $this->getArrayFromRows($animalRecords, 'nest_construction');
				$data['clutchSize'] = $this->getArrayFromRows($animalRecords, 'clutch_size');
				$data['plumage'] = $this->getArrayFromRows($animalRecords, 'plumage');
				break;
			
			case 'fishes':
					$data['waterType'] = $this->getArrayFromRows($animalRecords, 'water_type');
					$data['avgBodyTemp'] = $this->getArrayFromRows($animalRecords, 'average_body_temperature');
					$data['colour'] = $this->getArrayFromRows($animalRecords, 'colour');

				break;
				
			case 'mammals':
					$data['gestationalPeriod'] = $this->getArrayFromRows($animalRecords, 'gestational_period');
					$data['offspringNum'] = $this->getArrayFromRows($animalRecords, 'offspring_number');
				break;
			
			case 'reptiles':
					$data['clutchSize'] = $this->getArrayFromRows($animalRecords, 'clutch_size');
					$data['offspringNum'] = $this->getArrayFromRows($animalRecords, 'clutch_size');
				break;
				
			default:
				break;
		}
		
		return view('admin.animals.forms', [
			'category' => 'animals',
			'subcategory' => $type,
			'formType' => $id === 'new' ? 'new' : 'edit',
			'data' => $data,
		]);
	}
	
	/**
	 * Delete one of more animals from the database
	 *
	 * @param Request $request
	 * @param string $type
	 * @param string|null $subtype
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete(Request $request, string $type, ?string $subtype = null)
	{
		// Convert to array to me able to use method to remove one or more rows
		$ids = explode(',', $request->ids);
		$successAlert = sizeof($ids) > 1 ? 'Multiple records deleted successfully' : 'One record deleted successfully';
		
		if ($subtype) {
			// Remove the records from the database using destroy()
			call_user_func($this->getModel($subtype).'::'.'destroy', $ids);
			
			// Return the user to the table list
			return redirect(route('admin.animals.manage', ['type' => $type, 'id' => $request->animal_id]))->with('success', $successAlert);
			
		} else {
			
			// Remove the records from the database using destroy()
			call_user_func($this->getModel($type).'::'.'destroy', $ids);
			
			// Return the user to the table list
			return redirect(route('admin.animals.list', ['type' => $type]))->with('success', $successAlert);
		}
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
		if ($formType === 'newMedicalHistory' || $formType === 'editMedicalHistory') {
		
			$this->validator($request->all(), 'medicalHistory')->validate();
			
		} elseif ($formType === 'newWatchlistHistory' || $formType === 'editWatchlistHistory') {
			
			$this->validator($request->all(), 'watchlistHistory')->validate();
			
		} else {

			$this->validator($request->all())->validate();
		}
		
		
		// Create new or update record
		switch ($formType) {
			case 'newMedicalHistory':
				call_user_func($this->getModel('medicalHistory').'::'.'create', $request->all());
				break;
			
			case 'newWatchlistHistory':
				call_user_func($this->getModel('watchlistHistory').'::'.'create', $request->all());
				break;
			
			case 'new':
				// Save the images and add their filenames to the request
				if ($request->hasFile('files')) {
					
					$animal = call_user_func($this->getModel($type).'::'.'create', $request->except('files'));
					
					$uploadedImages = $this->uploadImages($request, $type, $animal->id);
					$animal->images = $uploadedImages;
					$animal->save();
					
				} else {
					
					call_user_func($this->getModel($type).'::'.'create', $request->all());
				}
				
				break;
			
			case 'editMedicalHistory':
				call_user_func($this->getModel('medicalHistory').'::'.'find', $request->id)->update($request->all());
				break;
			
			case 'editWatchlistHistory':
				call_user_func($this->getModel('watchlistHistory').'::'.'find', $request->id)->update($request->all());
				break;
				
			case 'edit':
				// Save the images and add their filenames to the request
				if ($request->hasFile('files')) {
					
					$images = $this->uploadImages($request, $type, $request->id);
					
					call_user_func($this->getModel($type).'::'.'find', $request->id)->update(array_merge($request->except('files'), ['images' => $images]));
				
				} else {
					
					call_user_func($this->getModel($type).'::'.'find', $request->id)->update($request->all());
				}
				
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		if ($formType === 'newMedicalHistory' || $formType === 'editMedicalHistory' || $formType === 'newWatchlistHistory' || $formType === 'editWatchlistHistory') {
			
			return redirect(route('admin.animals.manage', ['type'=> $type, 'id' => $request->animal_id]))->with('success', 'Animal History record updated.');
			
		} else {
			
			return redirect(route('admin.animals.list', ['type'=> $type]))->with('success', 'Animal records updated.');
			
		}
	}
	
	
	/** Method used to toggle animal visibility on website and in animal spotlight
	 *
	 * @param Request $request
	 * @param string $type
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function toggle(Request $request, string $type) {
		
		// Validate request
		Validator::make($request->all(), [
			'id' => ['required', 'string'],
			'toggler' => ['required', 'string', 'max:1']
		])->validate();
		
		// Toggle visibility
		if ($request->has('toggle-website')) {
			
			// Set the on_website value
			$animal = Animal::find($request->id);
			$animal->on_website = $request->toggler;
			$animal->in_spotlight = $request->toggler;
			
			$animal->save();
			
		} elseif ($request->has('toggle-spotlight')) {
			
			// Set the on_website value
			$animal = Animal::find($request->id);
			$animal->in_spotlight = $request->toggler;
			
			$animal->save();
		}
		
		// Redirect user to section table
		return redirect(route('admin.animals.list', ['type'=> $type]))->with('success', 'Animal visibility toggled');
	}
	
	
	/**
	 * Method to upload images
	 *
	 * @param Request $request
	 * @param string $type
	 * @param $id
	 *
	 * @return array
	 */
	public function uploadImages(Request $request, string $type, $id) {
		$imagesFilenames = [];
		
		if ($request->hasFile('files')) {
			
			// First remove the images for the specified animal
			$this->removeImages($id);
			
			// Store and add to db
			$images = $request->file('files');
			
			foreach ($images as $index=>$image) {
				// Store the image file
				$extension = $image->extension();
				$fileName = $type.'-'.$id.'-'.$index.'.'.$extension;
				
				Storage::disk('public_images')->putFileAs('animals', $image, $fileName);
				
				// Add to request as string to be added during creation
				array_push($imagesFilenames, $fileName);
			}
		}
		
		return $imagesFilenames;
	}
	
	/**
	 * Method to remove images
	 * @param string $id
	 */
	public function removeImages(string $id) {
		
		// Get the files to be deleted
		$filesInDir = Storage::disk('public_images')->files('animals');

		$imagesToBeRemoved = array_filter($filesInDir, function ($elem) use ($id) {
			$segments = explode('/', $elem);
			$filename = end($segments);
			$thisId = explode('-', $filename)[1];
			
			return $thisId === $id;
		});
		
		// Delete the files
		Storage::delete($imagesToBeRemoved);
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
	 * Get the name of the filename for storing.
	 *
	 * @param string $type
	 *
	 * @param int $index
	 *
	 * @return string|null
	 */
	public function getFileName(string $type, int $index, $id) {
		return $type.'-'.$id.'-'.$index;
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
			case 'fishes':
				return 'FIS';
			default: return null;
		}
	}
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param  array $data The data to be validated
	 *
	 * @param string|null $type
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data, ?string $type = null)
	{
		if ($type === 'medicalHistory') {
			
			$validationRules = [
				'animal_id' => ['required', 'string', 'max:45'],
				'datetime' => ['required', 'date'],
				'incident' => ['required', 'string'],
				'treatment' => ['required', 'string'],
			];
			
		} elseif ($type === 'watchlistHistory') {
			
			$validationRules = [
				'animal_id' => ['required', 'string', 'max:45'],
				'start' => ['required', 'date'],
				'end' => ['required', 'date'],
				'reason' => ['required', 'string'],
			];
			
		} else {
			
			$validationRules = [
				'id' => ['required', 'string', 'max:45'],
				'location_id' => ['required', 'string', 'max:45'],
				'species' => ['required', 'string', 'max:45'],
				'classification' => ['string', 'max:45'],
				'type' => ['required', 'string', 'in:BIRD,FISH,MAMMAL,REPTILE'],
				'name' => ['required', 'string', 'max:45'],
				'date_joined' => ['required', 'date'],
				'dob' => ['required', 'date'],
				'life_span' => ['required', 'numeric'],
				'gender' => ['required', 'string', 'in:FEMALE,MALE'],
				'height_joined' => ['required', 'numeric'],
				'height_current' => ['required', 'numeric'],
				'weight_joined' => ['required', 'numeric'],
				'weight_current' => ['required', 'numeric'],
				'files' => isset($data['files']) ? ['array'] : []
			];
			
			switch ($data['type']) {
				case 'BIRD':
					$validationRules['can_fly'] = ['string', 'in:Y,N'];
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
					$validationRules['reproduction_type'] = ['required', 'string', 'in:LIVE BEARER,EGG LAYER'];
					$validationRules['clutch_size'] = [$data['reproduction_type'] === 'LIVE BEARER' && 'required', $data['reproduction_type'] === 'LIVE BEARER' && 'numeric'];
					$validationRules['offspring_number'] = [$data['reproduction_type'] === 'LIVE BEARER' && 'required', $data['reproduction_type'] === 'LIVE BEARER' && 'numeric'];
					break;
				
				default: break;
			}
			
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
			case 'fishes':
			case 'mammals':
			case 'reptiles':
				return Animal::class;
				
			case 'medicalHistory':
				return AnimalMedicalHistory::class;
			
			case 'watchlistHistory':
				return AnimalWatchlistHistory::class;
				
			default: throw new \Error('Expected birds | fish | mammals | reptiles | medicalHistory | watchlistHistory. Instead got: '.$type);
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
