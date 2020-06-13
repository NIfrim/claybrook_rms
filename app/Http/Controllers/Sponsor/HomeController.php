<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use App\Models\AgreementSignage;
use App\Models\Animal;
use App\Models\Sponsor;
use App\Models\SponsorAgreement;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    	
        return view('sponsor.profile', [
        	'title' => $category,
			'category' => $subcategory,
			'subcategory' => null,
			'sponsor' => Auth::user(),
			'zoo' => $this->getData('zoos', [['id', '=', 1]])->first()
		]);
    }
    
	
	/**
	 * Show form for managing profile
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function profile($id = null)
	{
		$sponsorWithRelations = $this->getData('sponsors', [['id', '=', Auth::guard('sponsor')->id()]])->first();
		
		return view('sponsor.profile', [
			'title' => 'Personal details and other information',
			'category' => 'sponsor',
			'subcategory' => 'profile',
			'formType' => 'edit',
			'data' => $sponsorWithRelations,
			'zoo' => $sponsorWithRelations->zoo,
		]);
	}
	
	/**
	 * Show form for managing agreements
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function agreements($id = null)
	{
		$sponsorWithRelations = $this->getData('sponsors', [['id', '=', Auth::guard('sponsor')->id()]])->first();
		
		$animals = $this->getData('animals', [['agreement_signage_id', '=', null]]);
		
		return view('sponsor.agreements', [
			'title' => 'Sponsor one or more animals',
			'category' => 'sponsor',
			'subcategory' => 'agreements',
			'model' => $this->getModel('sponsors'),
			'sponsor' => $sponsorWithRelations,
			'relations' => $this->getRelations('sponsors'),
			'animals' => $animals,
			'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']]),
		]);
	}
	
	
	/**
	 * Method to submit data to the database
	 *
	 * @param Request $request
	 * @param string $type
	 *
	 * @param string|null $formType
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function submit(Request $request, string $type, ?string $formType = null) {
		
		
		// Get the form type from the name of the submit button
		if (!$formType) {
			$params = $request->keys();
			$formType = end($params);
		}
		
		if ($type === 'sponsor_agreements') {
			// Validate the form data
			$this->validator($request->all(), 'sponsor_agreements')->validate();
		} else {
			// Validate the form data
			$this->validator($request->all(), $formType)->validate();
		}
		
		// Create new or update record
		switch ($formType) {
			case 'new':
				// Save the images and add their filenames to the request
				if ($request->hasFile('images')) {
					
					$images = $this->uploadImages($request, $type);
					
					// Create sponsor agreement
					$agreement = call_user_func($this->getModel($type).'::create', $request->all());
			
					// Create the agreement signage and link to each animal selected
					foreach ($request->animal_id as $animal) {
						$agreementSignage =  call_user_func($this->getModel('agreement_signages').'::create', array_merge(['animal_id' => $animal], ['agreement_id' => $agreement->id], ['images' => $images]));
						
						$animal = call_user_func($this->getModel('animals').'::find', $agreementSignage->animal_id);
						$animal->agreement_signage_id = $agreementSignage->id;
						$animal->save();
					}
					
				} else {
					
					dd('No images');
					
					call_user_func($this->getModel($type).'::'.'create', $request->all());
				}
				
				break;
				
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
	
	
	/**
	 * Method to upload images
	 *
	 * @param Request $request
	 * @param string $type
	 * @return array
	 */
	public function uploadImages(Request $request, string $type) {
		$imagesFilenames = [];
		
		// First remove the images for the specified animal
		$this->removeImages($request->sponsor_id);
		
		// Store and add to db
		$images = $request->file('images');
		
		foreach ($images as $index=>$image) {
			// Store the image file
			$extension = $image->extension();
			$fileName = $type.'-'.$request->sponsor_id.'-'.$index.'.'.$extension;
			
			$image->storeAs('public/sponsors', $fileName);
			
			// Add to request as string to be added during creation
			array_push($imagesFilenames, $fileName);
		}
		
		return $imagesFilenames;
	}
	
	
	
	/**
	 * Method to remove images
	 * @param string $id
	 */
	public function removeImages(string $id) {
		
		// Get the files to be deleted
		$filesInDir = Storage::files('public/sponsors');
		$imagesToBeRemoved = array_filter($filesInDir, function ($elem) use ($id) {
			$segments = explode('/', $elem);
			$filename = end($segments);
			$thisId = explode('-', $filename)[1];
			
			return $thisId === $id;
		});
		
		// Delete the files
		Storage::delete($imagesToBeRemoved);
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
			case 'animals': return ['sponsorshipBand'];
			
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
			case 'animals': return Animal::class;
			
			case 'zoos': return Zoo::class;
			
			case 'sponsors': return Sponsor::class;
			
			case 'sponsor_agreements': return SponsorAgreement::class;
			
			case 'agreement_signages': return AgreementSignage::class;
			
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
				
			case 'sponsor_agreements':
				$rules = [
					'sponsor_id' => ['required', 'numeric'],
					'date' => ['required', 'date'],
					'agreement_start' => ['required', 'date'],
					'agreement_end' => ['required', 'date'],
					'animal_id' => ['required', 'array'],
					'images' => isset($data['images']) ? ['array'] : []
				];
				break;
				
			default:
				$rules = [];
				break;
		}
		
		return Validator::make($data, $rules);
	}
}
