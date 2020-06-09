<?php

namespace App\Http\Controllers\Admin\EventsAndNews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventsAndNewsController extends Controller
{
	public $category = 'eventsAndNews', $subcategory, $title, $idTemplate;
	
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
	 * Show all events and news.
	 *
	 * @param String $type [events | news]
	 * @param string|null $id
	 *
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, ?string $id)
	{
		$model = $this->getModel($type);
		$relations = $this->getRelations($type);
		
		if ($type === 'events' || $type === 'news') {
			$categories = call_user_func($this->getModel($type.'Category').'::get');
			$data['categories'] = $categories;
		}
		
		if ($id !== 'new' && $id !== 'newCategory') {
			
			$data['currentRow'] = call_user_func($model.'::'.'with', $relations)->find($id);
			
		} else {

			$data['zooId'] = 1;
			
		}
		
		
		return view('admin.eventsAndNews.forms', [
			'category' => 'eventsAndNews',
			'subcategory' => $type,
			'formType' => $id === 'newCategory' | $id === 'new' ? $id : 'edit',
			'data' => $data,
		]);
	}
	
	
	
	
	/**
	 * Show all the events or news records.
	 *
	 * @param String $type
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list(string $type)
	{
		return view('admin.eventsAndNews.home', [
			'category' => 'eventsAndNews',
			'subcategory' => $type,
			'model' => $this->getModel($type),
			'relations' => $this->getRelations($type),
		]);
	}
	
	
	
	
	/**
	 * Show all the events or news records categories.
	 *
	 * @param String $type
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function listCategories(string $type)
	{
		return view('admin.eventsAndNews.home', [
			'category' => 'eventsAndNews',
			'subcategory' => $type,
			'subcategory2' => 'categories',
			'model' => $this->getModel($type.'Category'),
			'relations' => $this->getRelations($type.'Category'),
		]);
	}
	
	
	
	/**
	 * Method to upload images
	 *
	 * @param Request $request
	 * @param string $type
	 * @return string
	 */
	public function uploadImages(Request $request, string $type) {
		$imageFilename = '';
		
		if ($request->hasFile('file')) {
			
			// First remove the images for the specified animal
			$this->removeImages($request->id, $type);
			
			// Store and add to db
			$image = $request->file('file');
			
			// Store the image file
			$extension = $image->extension();
			$fileName = str_replace(' ', '_', $request->title).'-'.$request->id.'.'.$extension;
			
			$image->storeAs('public/'.$type, $fileName);
			
			// Add to request as string to be added during creation
			$imageFilename = $fileName;
		}
		
		return $imageFilename;
	}
	
	
	/**
	 * Method to remove images
	 *
	 * @param string $id
	 * @param string $type
	 */
	public function removeImages(string $id, string $type) {
		
		// Get the files to be deleted
		$filesInDir = Storage::files('public/'.$type);
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
		call_user_func($this->getModel($type).'::destroy', $ids);
		
		// Return the user to the table list
		if ($type === 'eventsCategory' || $type === 'newsCategory') {
			// Get subcategory by splitting the $type string into an array of words with uppercase letters as delimiters
			$subcategory = preg_split('/(?=[A-Z])/', $type, -1, PREG_SPLIT_NO_EMPTY)[0];
			
			return redirect(route('admin.eventsAndNews.list.categories', ['type' => $subcategory]))->with('success', $successAlert);
			
		} else {
			
			return redirect(route('admin.eventsAndNews.list', ['type' => $type]))->with('success', $successAlert);
			
		}
		
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
		$this->validator($request->all(), $type)->validate();
		
		// Create new or update record
		switch ($formType) {
			case 'newCategory':
				// Save the images and add their filenames to the request
				if ($request->hasFile('file')) {
					$image = $this->uploadImages($request, $type);
					
					call_user_func('App\Models\\'.ucfirst($type).'Category::create', array_merge($request->except('file'), ['image' => $image]));
					
				} else {
					
					call_user_func('App\Models\\'.ucfirst($type).'Category::create', $request->except('file'));
				}
				
				break;
			
			case 'new':
				// Save the images and add their filenames to the request
				if ($request->hasFile('file')) {
					
					$image = $this->uploadImages($request, $type);
					
					call_user_func($this->getModel($type).'::create', array_merge($request->except('file'), ['image' => $image]));
				
				} else {
					
					call_user_func($this->getModel($type).'::create', $request->except('file'));
				}
				
				break;
			
			case 'edit':
				// Save the images and add their filenames to the request
				if ($request->hasFile('file')) {
					
					$image = $this->uploadImages($request, $type);
					
					call_user_func($this->getModel($type).'::find', $request->id)->update(array_merge($request->except('file'), ['image' => $image]));
					
				} else {
					
					call_user_func($this->getModel($type).'::find', $request->id)->update($request->except('file'));
				}
				
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		if ($type === 'eventsCategory' || $type === 'newsCategory') {
			// Get subcategory by splitting the $type string into an array of words with uppercase letters as delimiters
			$subcategory = preg_split('/(?=[A-Z])/', $type, -1, PREG_SPLIT_NO_EMPTY)[0];
			
			return redirect(route('admin.eventsAndNews.list.categories', ['type' => $subcategory]))->with('success', 'Successfully edited a category for '.$subcategory);
			
		} else {
			
			return redirect(route('admin.eventsAndNews.list', ['type'=> $type]))->with('success', 'Successfully saved one record');
			
		}
	}
	
	/** Get the relations specific to the model
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(String $type) {
		switch ($type) {
			case 'events':
				return ['eventCategory', 'zoo'];
			
			case 'news':
				return ['newsCategory', 'zoo'];
			
			case 'eventsCategory':
				return ['events'];
			case 'newsCategory':
				return ['news'];
			
			default:
				return [];
		}
	}
	
	/**
	 * Return array with specific data based on column.
	 *
	 * @param object $rows
	 * @param String $column
	 *
	 * @return array
	 */
	private function getColumn(object $rows, String $column) {
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
	 * @param array $request
	 * @param $type
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	private function validator(array $request, $type)
	{
		$validationRules = [
			'title' => ['required', 'string', 'max:255'],
			'short_description' => ['required', 'string'],
			'long_description' => ['required', 'string'],
		];
		
		// Add related inputs if
		if ($request['submitType'] !== 'category') {
			switch ($type) {
				case 'events':
					$validationRules['zoo_id'] = ['required', 'numeric'];
					$validationRules['category_id'] = ['required', 'numeric'];
					$validationRules['start_date'] = ['required', 'date'];
					$validationRules['end_date'] = ['required', 'date'];
					$validationRules['repeat'] = ['required', 'string', 'in:MONTHLY,YEARLY,NEVER'];
					break;
					
				case 'news':
					$validationRules['zoo_id'] = ['required', 'numeric'];
					$validationRules['category_id'] = ['required', 'numeric'];
					$validationRules['date_posted'] = ['required', 'date'];
					$validationRules['date_expire'] = ['required', 'date'];
					$validationRules['repeat'] = ['required', 'string', 'in:MONTHLY,YEARLY,NEVER'];
					break;
				
				default: break;
			}
		}
		
		return Validator::make($request, $validationRules);
	}
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param string $type
	 *
	 * @return string
	 */
	private function getModel(string $type)
	{
		switch ($type) {
			case 'eventsCategory':
				return 'App\Models\EventsCategory';
				break;
			
			case 'newsCategory':
				return 'App\Models\NewsCategory';
				break;
			
			case 'events':
				return 'App\Models\Event';
				break;
			
			case 'news':
				return 'App\Models\News';
				break;
				
			default: return null;
		}
	}
}
