<?php

namespace App\Http\Controllers\Admin\Sponsors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SponsorsController extends Controller
{
	public $category = 'sponsors', $subcategory, $title, $idTemplate;
	
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
	 * @param string|null $subType
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
		return view('admin.sponsors.home', [
			'category' => $this->category,
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
		
		return redirect(route('admin.sponsors.list', ['type' => $type]))->with('success', $successAlert);
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
			case 'accounts':
				return ['zoo', 'reviews', 'paymentDetails', 'sponsorAgreements'];
			
			case 'agreements':
				return ['sponsor'];
			
			case 'signage':
				return ['animals', 'sponsorAgreement'];
			
			default:
				return [];
		}
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
			case 'accounts':
				return 'App\Models\Sponsor';
				break;
			
			case 'agreements':
				return 'App\Models\SponsorAgreement';
				break;
			
			case 'signage':
				return 'App\Models\AgreementSignage';
				break;
			
			default: return null;
		}
	}
}
