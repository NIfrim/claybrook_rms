<?php

namespace App\Http\Controllers\Admin\EventsAndNews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsAndNewsController extends Controller
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
		$model = $this->getModel($type);
		$relations = $this->getRelations($type);
		$categories = call_user_func($type === 'events' ? 'App\Models\EventsCategory::all' : 'App\Models\NewsCategory::get');
		
		$data['type'] = substr(strtoupper($type), 0, -1);
		
		if ($id !== 'new') {
			
			$data['currentRow'] = call_user_func($model.'::'.'with', $relations)->find($id);
			
		} else {

			$data['zooId'] = 1;
			$data['categories'] = $categories;
			
		}
		
		return view('admin.eventsAndNews.forms', [
			'category' => 'eventsAndNews',
			'subcategory' => $type,
			'formType' => gettype($id) === 'string' ? $id : 'edit',
			'data' => $data,
		]);
	}
	
	/**
	 * Show all the events records.
	 *
	 * @param String $type
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list(String $type)
	{
		return view('admin.eventsAndNews.home', [
			'category' => 'eventsAndNews',
			'subcategory' => $type,
			'model' => $this->getModel($type),
			'relations' => $this->getRelations($type),
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
		$this->validator($request->all(), $type)->validate();
		
		// Create new or update record
		switch ($formType) {
			case 'newCategory':
				call_user_func('App\Models\\'.ucfirst($type).'Category::create', $request->all());
				break;
			
			case 'new':
				call_user_func($this->getModel($type).'::create', $request->all());
				break;
			
			case 'edit':
				call_user_func($this->getModel($type).'::find', $request->id)->update($request->all());
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.locations.list', ['type'=> $type]));
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
				return ['EventsCategory', 'zoo'];
			
			case 'news':
				return ['NewsCategory', 'zoo'];
			
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
	 * Return only specific columns from rows.
	 *
	 * @param String $str
	 *
	 * @return integer
	 */
	private function getNumberFromString(String $str) {
		// d+ matches series of digits
		preg_match('!\d+!', $str, $matches);
		return $matches[0];
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
			'name' => ['required', 'string', 'max:45'],
			'title' => ['required', 'string', 'max:255'],
			'short_description' => ['required', 'string'],
			'long_description' => ['required', 'string'],
			'image' => [isset($request['image']) ? 'string' : ''],
		];
		
		// Add related inputs if
		if ($request['submitType'] !== 'category') {
			switch ($type) {
				case 'events':
					$validationRules['zoo_id'] = ['required', 'numeric'];
					$validationRules['category_id'] = ['required', 'numeric'];
					$validationRules['start_date'] = ['required', 'date'];
					$validationRules['end_date'] = ['required', 'date'];
					$validationRules['repeat'] = ['required', 'string', 'in:DAILY,WEEKLY,MONTHLY,YEARLY,NEVER'];
					break;
					
				case 'news':
					$validationRules['zoo_id'] = ['required', 'numeric'];
					$validationRules['category_id'] = ['required', 'numeric'];
					$validationRules['date_posted'] = ['required', 'date'];
					$validationRules['date_expire'] = ['required', 'date'];
					$validationRules['repeat'] = ['required', 'string', 'in:DAILY,WEEKLY,MONTHLY,YEARLY,NEVER'];
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
			case 'events':
				return 'App\Models\Event';
				break;
			
			case 'news':
				return 'App\Models\News';
				break;
				
			default: return '{$type} parameter is missing or not known';
		}
	}
}
