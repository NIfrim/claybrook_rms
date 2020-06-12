<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use App\Models\AccountType;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
	public $category = 'employees';
	
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
	 * @param string $type // The type of the data model
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list(string $type)
	{
		return view('admin.employees.home', [
			'category' => $this->category,
			'subcategory' => $type,
			'model' => $this->getModel($type),
			'relations' => $this->getRelations($type),
		]);
	}
	
	/**
	 * Show form for managing attraction.
	 *
	 * @param string $type
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, $id = null)
	{
		$relations = $this->getRelations($type);
		$model = $this->getModel($type);
		
		// Add all the account types
		$data['accountTypes'] = call_user_func($this->getModel('accountTypes').'::get')->all();
		
		if ($id && $id !== 'new') {
			
			$data['currentRow'] = call_user_func($model.'::with', $relations)->find($id);
			
		} else {
			
			$data['zooId'] = 1;
			
		}
		
		return view('admin.employees.forms', [
			'category' => $this->category,
			'subcategory' => $type,
			'formType' => $id && $id !== 'new' ? 'edit' : 'new',
			'data' => $data,
		]);
	}
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param string $type
	 * @param string $formType
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function submit(Request $request, string $type, string $formType) {
		
		// Validate the form data
		$this->validator($request->all(), $type)->validate();
		
		
		// Create new or update record
		switch ($formType) {
			case 'new':
				
				if ($type === 'accountTypes') {
					
					call_user_func($this->getModel($type).'::create',array_merge($request->only('_token', 'name'), ['permissions' => $this->getPermissions($request)]));
					
				} else {
					
					call_user_func($this->getModel($type).'::create',$request->all());
					
				}
				
				
				break;
			
			case 'edit':
				
				if ($type === 'accountTypes') {
					
					call_user_func($this->getModel($type).'::find', $request->id)->update(array_merge($request->only('_token', 'name'), ['permissions' => $this->getPermissions($request)]));
					
				} else {
					
					call_user_func($this->getModel($type).'::find', $request->id)->update($request->all());
				
				}
				
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.employees.list', [
			'type' => $type
		]))->with('success', 'Record saved/updated successfully!');
	}
	
	
	
	/**
	 * Delete one of more attractions from the database
	 *
	 * @param Request $request
	 *
	 * @param string $type
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete(Request $request, string $type)
	{
		// Convert to array to me able to use method to remove one or more rows
		$ids = explode(',', $request->ids);
		
		$successAlert = sizeof($ids) > 1 ? 'Multiple records deleted successfully' : 'One record deleted successfully';
		
		try {
			
			// Remove the records from the database using destroy()
			call_user_func($this->getModel($type).'::destroy', $ids);
			
			return redirect(route('admin.employees.list', [
				'type' => $type
			]))->with('success', $successAlert);
			
		} catch (\Exception $exc) {
			
			return redirect(route('admin.employees.list', [
				'type' => $type
			]))->with('error', 'Error encountered while trying to delete a record from the database.');
			
		}
	}
	
	
	private function getPermissions(Request $request) {
		return array_merge(
			['animals' => $request->animals ?? ['NONE']],
			['attractions' => $request->attractions ?? ['NONE']],
			['ticketsAndPasses' => $request->tickesAndPasses ?? ['NONE']],
			['reviews' => $request->reviews ?? ['NONE']],
			['employees' => $request->employees ?? ['NONE']],
			['sponsors' => $request->sponsors ?? ['NONE']],
			['locations' => $request->locations ?? ['NONE']],
			['eventsAndNews' => $request->animals ?? ['NONE']]
		);
	}
	
	
	/** Get the relations specific to the model
	 *
	 * @param string $type
	 *
	 * @return array
	 */
	private function getRelations(string $type) {
		
		switch ($type) {
			
			case 'accounts': return ['accountType'];
			
			case 'accountTypes': return [];
			
			default: throw new \Error('Error encountered while getting relations: Expected "accounts" | "accountTypes", instead got: '.$type);
			
		}
		
	}
	
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param string $model
	 *
	 * @return string
	 */
	private function getModel(string $model)
	{
		switch ($model) {
			case 'accounts': return Employee::class;
			
			case 'accountTypes': return AccountType::class;
			
			default: throw new \Error('Error retrieving the model: Expected "accounts" | "accountTypes", instead got: '.$model);
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
	 * @param  array $data The data to be validated
	 *
	 * @param string $type
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data, string $type)
	{
		switch ($type) {
			case 'accounts':
				$validationRules = [
					'zoo_id' => ['required', 'numeric'],
					'account_type_id' => isset($data['account_type_id']) ? ['numeric'] : [],
					'title' => ['required', 'string', 'max:5'],
					'first_name' => ['required', 'string', 'max:45'],
					'last_name' => ['required', 'string', 'max:45'],
					'job_title' => ['required', 'string', 'max:45'],
					'email' => ['required', 'email'],
				];
				break;
			
			case 'accountTypes':
				$validationRules = [
					'name' => ['required', 'string'],
					'animals' => isset($data['animals']) ? ['array'] : [],
					'attractions' => isset($data['attractions']) ? ['array'] : [],
					'ticketsAndPasses' => isset($data['ticketsAndPasses']) ? ['array'] : [],
					'reviews' => isset($data['reviews']) ? ['array'] : [],
					'sponsors' => isset($data['sponsors']) ? ['array'] : [],
					'employees' => isset($data['employees']) ? ['array'] : [],
					'locations' => isset($data['locations']) ? ['array'] : [],
					'eventsAndNews' => isset($data['eventsAndNews']) ? ['array'] : [],
				];
				break;
				
			default: throw new \Error('Error validating request: Expected "accounts" | "accountTypes", instead got: '.$type);
		}
		
		return Validator::make($data, $validationRules);
	}
}
