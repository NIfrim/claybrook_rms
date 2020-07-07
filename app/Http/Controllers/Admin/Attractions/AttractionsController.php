<?php

namespace App\Http\Controllers\Admin\Attractions;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttractionsController extends Controller
{
	public $category = 'attractions';
	
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
	 * Show all the attractions.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list()
	{
		return view('admin.attractions.home', [
			'category' => $this->category,
			'subcategory' => null,
			'model' => $this->getModel(),
			'relations' => $this->getRelations(),
		]);
	}
	
	/**
	 * Show form for managing attraction.
	 *
	 * @param string|new $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(?string $id = 'new')
	{
		$relations = $this->getRelations();
		
		$attractionsRecords = call_user_func($this->getModel().'::with', $relations)->get();
		
		$data = [
			'attractionTypes' =>  $this->getArrayFromRows($attractionsRecords, 'type'),
		];
		
		if ($id === 'new') {
			
			$data['zooId'] = 1;
			
		} else {
			
			$data['currentRow'] = call_user_func($this->getModel().'::with', $relations)->find($id);
			
		}
		
		return view('admin.attractions.forms', [
			'category' => 'attractions',
			'subcategory' => null,
			'formType' => $id === 'new' ? 'new' : 'edit',
			'data' => $data,
		]);
	}
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param String $formType new|edit
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function submit(Request $request, string $formType) {
		// Validate the form data
		$this->validator($request->all())->validate();
		
		// Create new or update record
		switch ($formType) {
			case 'new':
				// Save the images and add their filenames to the request
				if ($request->hasFile('files')) {
					
					$images = $this->uploadImages($request);
					
					call_user_func($this->getModel().'::create', array_merge($request->except('files'), ['images' => $images]));
					
				} else {
					
					call_user_func($this->getModel().'::create',$request->except('files'));
				}
				
				break;
			
			case 'edit':
				// Save the images and add their filenames to the request
				if ($request->hasFile('files')) {
					
					$images = $this->uploadImages($request);
					
					call_user_func($this->getModel().'::find', $request->id)->update(array_merge($request->except('files'), ['images' => $images]));
				
				} else {
					
					call_user_func($this->getModel().'::find', $request->id)->update($request->except('files'));
				}
				
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.attractions.list'))->with('success', 'Attraction saved/updated successfully!');
	}
	
	/**
	 * Delete one of more attractions from the database
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete(Request $request)
	{
		// Convert to array to me able to use method to remove one or more rows
		$ids = explode(',', $request->ids);
		
		$successAlert = sizeof($ids) > 1 ? 'Multiple records deleted successfully' : 'One record deleted successfully';
		
		// Remove the records from the database using destroy()
		call_user_func($this->getModel().'::destroy', $ids);
		
		return redirect(route('admin.attractions.list'))->with('success', $successAlert);
	}
	
	/** Get the relations specific to the model
	 *
	 * @return array
	 */
	private function getRelations() {
		return ['zoo'];
	}
	
	
	
	/**
	 * Method to upload images
	 *
	 * @param Request $request
	 * @return array
	 */
	public function uploadImages(Request $request) {
		$imagesFilenames = [];
		
		if ($request->hasFile('files')) {
			
			// First remove the images for the specified animal
			$this->removeImages($request->id);
			
			// Store and add to db
			$images = $request->file('files');
			
			foreach ($images as $index=>$image) {
				// Store the image file
				$extension = $image->extension();
				$rideName = str_replace(' ', '_', $request->name);
				$fileName = $rideName.'-'.$request->id.'-'.$index.'.'.$extension;
				
				Storage::disk('public_images')->putFileAs('attractions', $image, $fileName);
				
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
		$filesInDir = Storage::disk('public_images')->files('attractions');
		
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
	 * Get a validator for an incoming form request.
	 *
	 * @return string
	 */
	private function getModel()
	{
		return Attraction::class;
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
	 * Get a validator for an incoming form request.
	 *
	 * @param  array $data 		The data to be validated
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		$validationRules = [
			'zoo_id' => ['required', 'numeric'],
			'name' => ['required', 'string', 'max:45'],
			'type' => ['required', 'string', 'max:45'],
			'short_description' => ['required', 'string', 'max:255'],
			'long_description' => [isset($data['long_description']) ? 'string' : ''],
		];
		
		return Validator::make($data, $validationRules);
	}
}
