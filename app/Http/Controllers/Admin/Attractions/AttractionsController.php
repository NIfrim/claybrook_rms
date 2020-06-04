<?php

namespace App\Http\Controllers\Admin\Attractions;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Http\Request;
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
	 * @param string|null $id
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
				call_user_func($this->getModel().'::create', $request->all());
				break;
			
			case 'edit':
				call_user_func($this->getModel().'::find', $request->id)->update($request->all());
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
