<?php

namespace App\Http\Controllers\Admin\Zoo;

use App\Http\Controllers\Controller;
use App\Models\Zoo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZooController extends Controller
{
	public $category = 'zoo';
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	
	
	/** Show the correct form
	 *
	 * @param string $type
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, ?string $id = null)
	{
		$model = $this->getModel($type);
		$relations = $this->getRelations();
		
		$data = call_user_func($model.'::'.'with', $relations)->find($id);
		
		return view('admin.zoo.forms', [
			'category' => $this->category,
			'subcategory' => $type,
			'formType' => $id === 'new' ? 'new' : 'edit',
			'data' => $data,
		]);
	}
	
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param string $type
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
				call_user_func($this->getModel($type).'::create', $request->all());
				break;
			
			case 'edit':
				call_user_func($this->getModel($type).'::find', $request->id)->update($request->all());
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.zoo.manage', ['type' => $type, 'id'=> $request->id]));
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
			'company_number' => ['required', 'numeric', 'max:9999999999'],
			'name' => ['required', 'string', 'max:45'],
			'address' => ['required', 'array'],
			'contact_details' => ['required', 'array'],
			'maps' => isset($data['maps']) ? ['array'] : [],
			'opening_times' => ['required', 'array'],
			'files' => isset($data['files']) ? ['array'] : [],
			'history' => isset($data['history']) ? ['string'] : [],
		];
		
		return Validator::make($data, $validationRules);
	}
	
	
	/** Get the relations specific to the model
	 *
	 * @return array
	 */
	private function getRelations() {
		return [];
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
			case 'details':
				return Zoo::class;
			
			default: throw new \Error('Expected details. Instead got: '.$type);
		}
	}
}
