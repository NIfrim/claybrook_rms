<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\SponsorAgreement;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sponsor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$category = $url[1];
		$subcategory = $url[2] ?? null;
    	
        return view('sponsor.home', [
        	'title' => $category,
			'category' => $subcategory,
			'subcategory' => null,
			'sponsor' => Auth::user(),
			'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])
		]);
    }
    
	
	/**
	 * Show form for managing profile
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function profile()
	{
		$sponsorWithRelations = $this->getData('sponsors', [['id', '=', Auth::guard('sponsor')->id()]])->first();
		
		return view('sponsor.profile', [
			'title' => 'Personal details and other information',
			'category' => 'attractions',
			'subcategory' => null,
			'formType' => 'edit',
			'data' => $sponsorWithRelations,
			'zoo' => $sponsorWithRelations->zoo,
		]);
	}
	
	/**
	 * Show form for managing profile
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function agreements()
	{
		$sponsorWithRelations = $this->getData('sponsors', [['id', '=', Auth::guard('sponsor')->id()]])->first();
		
		return view('sponsor.agreements', [
			'title' => 'Sponsorship Agreements',
			'category' => 'sponsor',
			'subcategory' => 'agreements',
			'model' => Sponsor::class,
			'data' => $sponsorWithRelations,
			'relations' => $this->getRelations('sponsors'),
			'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']]),
		]);
	}
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param string $type
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function submit(Request $request) {

		// Get the form type from the name of the submit button
		$params = $request->keys();
		$formType = end($params);
		
		// Validate the form data
		$this->validator($request->all(), $formType)->validate();
		
		// Create new or update record
		switch ($formType) {
			
			case 'update-address':
			case 'update-sponsor':
				call_user_func($this->getModel('sponsors').'::find', $request->id)->update($request->all());
				break;

			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('sponsor.profile.show'))->with('success', 'Record successfully updated!');
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
		
		
		return redirect(route('admin.attractions.list'))->with('success', 'Sorry to see you go!');
	}
	
	/** Returns list of data using specified table
	 *  Accepts filters as array ['attribute', 'comparator', 'value'];
	 *
	 * @param string $table
	 * @param array|null $filters
	 *
	 * @return Model
	 */
	private function getData(string $table, ?array $filters = null) {
		
		$relations = $this->getRelations($table);
		
		if ($filters) {
			
			$data = call_user_func($this->getModel($table).'::with', $relations)->where($filters)->get();
			
		} else {
			
			$data = call_user_func($this->getModel($table).'::with', $relations)->get();
			
		}
		
		return $data;
	}
	
	/** Get the relations specific to the model
	 *
	 * @param string $table
	 *
	 * @return array
	 */
	private function getRelations(string $table) {
		switch ($table) {
			case 'sponsors': return ['zoo', 'reviews', 'paymentDetails', 'sponsorAgreements'];
			
			case 'sponsor_agreements': return ['sponsor', 'signages'];
			
			default: return [];
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
			case 'zoos': return Zoo::class;
			
			case 'sponsors': return Sponsor::class;
			
			case 'sponsor_agreements': return SponsorAgreement::class;
			
			default: throw new \Error('Cannot get model for: '.$model);
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
			case 'update-sponsor':
				$rules = [
					'id' => ['required'],
					'title' => ['required', 'string', 'max:5'],
					'first_name' => ['required', 'string', 'max:45'],
					'last_name' => ['required', 'string', 'max:45'],
					'job_title' => ['required', 'string', 'max:45'],
					'email' => ['required', 'string', 'email', 'max:255'],
					'primary_contact_number' => isset($data['primary_contact_number']) ? ['string', 'max:15'] : [],
					'secondary_contact_number' => isset($data['secondary_contact_number']) ? ['string', 'max:15'] : [],
				];
				break;
				
			case 'update-address':
				$rules = [
					'id' => ['required'],
					'building' => ['required', 'string', 'max:45'],
					'road' => ['required', 'string', 'max:45'],
					'city' => ['required', 'string', 'max:45'],
					'postcode' => ['required', 'string', 'max:10'],
				];
				break;
				
			default:
				$rules = [];
				break;
		}
		
		return Validator::make($data, $rules);
	}
}
