<?php

namespace App\Http\Controllers\Admin\TicketsAndPasses;

use App\Http\Controllers\Controller;
use App\Models\Pass;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketsAndPassesController extends Controller
{
	public $category = 'tickets-and-passes', $subcategory, $title, $idTemplate;
	
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
	 * Show all the tickets and passes.
	 *
	 * @param String $type {tickets | passes}
	 * @param string|null $id
	 *
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, ?string $id)
	{
		$model = $this->getModel($type);
		$relations = $this->getRelations($type);
		
		if ($id === 'new') {
			
			$data['zooId'] = 1;
			
		} else {
			
			$data['currentRow'] = call_user_func($model.'::'.'with', $relations)->find($id);
			
		}
		
		return view('admin.ticketsAndPasses.forms', [
			'category' => 'ticketsAndPasses',
			'subcategory' => $type,
			'formType' => $id === 'new' ? $id : 'edit',
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
		return view('admin.ticketsAndPasses.home', [
			'category' => 'ticketsAndPasses',
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
		call_user_func($this->getModel($type).'::destroy', $ids);

		// Redirect back
		return redirect(route('admin.ticketsAndPasses.list', ['type' => $type]))->with('success', $successAlert);
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
			case 'new':
				call_user_func($this->getModel($type).'::create', $request->all());
				break;
			
			case 'edit':
				call_user_func($this->getModel($type).'::find', $request->id)->update($request->all());
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.ticketsAndPasses.list', ['type'=> $type]))->with('success', 'Successfully saved one record');
	}
	
	/** Get the relations specific to the model
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(String $type) {
		switch ($type) {
			case 'tickets':
				return ['zoo'];
			
			case 'passes':
				return ['zoo'];

			default:
				return [];
		}
	}
	
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @param array $request
	 *
	 * @param string $type
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	private function validator(array $request, string $type)
	{
		$validationRules = [
			'zoo_id' => ['required', 'numeric'],
			'type' => ['required', 'string', $type === 'tickets' ? 'in:ADULT,CHILD,FAMILY' : 'in:ADULT,FAMILY'],
			'price_online' => ['required', 'numeric'],
			'price_gate' => ['required', 'numeric'],
		];
		
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
			case 'tickets':
				return Ticket::class;
				break;
			
			case 'passes':
				return Pass::class;
				break;
			
			default: return null;
		}
	}
}
