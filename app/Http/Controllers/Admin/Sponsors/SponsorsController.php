<?php

namespace App\Http\Controllers\Admin\Sponsors;

use App\Http\Controllers\Controller;
use App\Models\AgreementSignage;
use App\Models\Sponsor;
use App\Models\SponsorAgreement;
use App\Models\SponsorshipBand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showForm(string $type, ?string $id)
	{
		$model = $this->getModel($type);
		$relations = $this->getRelations($type);
		
		if ($id !== 'new') {
			
			$data['currentRow'] = call_user_func($model.'::'.'with', $relations)->find($id);
			
		} else {
			
			$data['zooId'] = 1;
			
		}
		
		return view('admin.sponsors.forms', [
			'category' => 'sponsors',
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
			case 'new':
				call_user_func($this->getModel($type).'::create', $request->all());
				break;
			
			case 'edit':
				call_user_func($this->getModel($type).'::find', $request->id)->update($request->all());
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.sponsors.list', ['type' => $type]))->with('success', 'Successfully updated one record');
	}
	
	/** Get the relations specific to the model
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(String $type) {
		switch ($type) {
			case 'sponsorshipBands':
				return ['animals'];
			
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
		$validationRules = [];
		// Add the related validation rules
		switch ($type) {
			case 'sponsorshipBands':
				$validationRules['id'] = ['required', 'string', 'max:1'];
				$validationRules['price'] = ['required', 'numeric'];
				$validationRules['duration'] = ['required', 'numeric', 'max:12'];
				break;
			
			case 'accounts':
				$sponsor = Sponsor::where('email', $request['email'])->first();
				$validationRules['zoo_id'] = ['required', 'numeric'];
				$validationRules['title'] = ['required', 'string', 'in:Mr.,Mrs.,Ms.,Miss.,Dr.,Prof.'];
				$validationRules['first_name'] = ['required', 'string', 'max:45'];
				$validationRules['last_name'] = ['required', 'string', 'max:45'];
				$validationRules['email'] = ['required', 'email', Rule::unique('sponsors')->ignore($sponsor), 'max:255'];
				$validationRules['primary_contact_number'] = ['required', 'string', Rule::unique('sponsors')->ignore($sponsor), 'max:15'];
				if (isset($request['secondary_contact_number'])) $validationRules['secondary_contact_number'] = ['string', Rule::unique('sponsors')->ignore($sponsor), 'max:15'];
				if (isset($request['building'])) $validationRules['building'] = ['string', 'max:45'];
				if (isset($request['road'])) $validationRules['road'] = ['string', 'max:45'];
				if (isset($request['city'])) $validationRules['city'] = ['string', 'max:45'];
				if (isset($request['postcode'])) $validationRules['postcode'] = ['string', 'max:10'];
				$validationRules['active'] = ['required', 'numeric', 'in:0,1'];
				break;
			
			case 'agreements':
				$validationRules['sponsor_id'] = ['required', 'numeric'];
				$validationRules['date'] = ['required', 'date'];
				$validationRules['agreement_start'] = ['required', 'date'];
				$validationRules['agreement_end'] = ['required', 'date'];
				$validationRules['signage_area'] = ['required', 'numeric'];
				if (isset($request['documents'])) $validationRules['documents'] = ['array'];
				$validationRules['payment_status'] = ['required', 'string', 'in:PENDING,PAID,OVERDUE,DECLINED'];
				break;
			
			case 'signage':
				$validationRules['animal_id'] = ['required', 'string', 'max:45'];
				$validationRules['agreement_id'] = ['required', 'numeric'];
				$validationRules['status'] = ['required', 'string', 'in:APPROVED,DENIED,PENDING'];
				if (isset($request['reason'])) $validationRules['reason'] = ['string'];
				if (isset($request['images'])) $validationRules['images'] = ['array'];
				break;
			
			default: break;
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
			case 'sponsorshipBands':
				return SponsorshipBand::class;
			
			case 'accounts':
				return Sponsor::class;
			
			case 'agreements':
				return SponsorAgreement::class;
			
			case 'signage':
				return AgreementSignage::class;
			
			default: throw new \Error('Could not get model for: '.$type);
		}
	}
}
