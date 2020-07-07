<?php

namespace App\Http\Controllers\Admin\Zoo;

use App\Http\Controllers\Controller;
use App\Models\Zoo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
		$this->validator($request->all(), $type)->validate();
		
		// Create new or update record
		switch ($formType) {
			case 'new':
				if ($request->hasFile('map_image') && $type === 'details') {
					
					$image = $this->uploadOneImage($request, 'map_image');
					
					call_user_func($this->getModel($type).'::create', array_merge($request->except('map_image'), ['map_image' => $image]));
					
				} elseif ($request -> hasFile('images') && $type === 'details') {
					
					$images = $this->uploadImages($request, 'zoo_image');
					
					call_user_func($this->getModel($type).'::create', array_merge($request->except('images'), ['images' => $images]));
					
				} else {
					
					call_user_func($this->getModel($type).'::create', $request->all());
				}
				
				
				break;
			
			case 'edit':
				
				if ($request->hasFile('map_image') && $type === 'details') {
					
					$image = $this->uploadOneImage($request, 'map_image');
					
					call_user_func($this->getModel($type).'::find', $request->id)->update(array_merge($request->except('map_image'), ['map_image' => $image]));
					
				} elseif ($request -> hasFile('images') && $type === 'details') {
					
					$images = $this->uploadImages($request, 'zoo_image');
					
					call_user_func($this->getModel($type).'::find', $request->id)->update(array_merge($request->except('images'), ['images' => $images]));
					
				} else {
					
					// Put address inputs into array of key value pairs
					if ($type === 'address') {
						
						// Store the array with address inputs
						$address = [];
						
						foreach ($request->except(['_token', 'submit-zoo-address', 'id']) as $name => $value) {
							$address[$name] = $value;
						}
						
						call_user_func($this->getModel($type).'::find', $request->id)->update(array_merge($request->only('_token', 'id'), ['address' => $address]));
						
					} else {
						
						call_user_func($this->getModel($type).'::find', $request->id)->update($request->all());

					}
				}
				
				
				break;
			
			default: break;
		}
		
		// Redirect user to section table
		return redirect(route('admin.zoo.manage', ['type' => $type, 'id'=> $request->id]));
	}
	
	
	/**
	 * Method to upload images
	 *
	 * @param Request $request
	 * @param string $type
	 *
	 * @return string
	 */
	public function uploadOneImage(Request $request, string $type) {
		
		// First remove the images for the specified animal
		$this->removeImages($request->id, $type);
		
		// Store and add to db
		$image = $request->file($type);
		
		// Store the image file
		$extension = $image->extension();
		$fileName = $type.'-'.$request->id.'.'.$extension;
		
		Storage::disk('public_images')->putFileAs('zoo', $image, $fileName);
		
		// Add to request as string to be added during creation
		$imageFilename = $fileName;
		
		return $imageFilename;
	}
	
	
	/**
	 * Method to upload images
	 *
	 * @param Request $request
	 * @param string $type
	 *
	 * @return array
	 */
	public function uploadImages(Request $request, string $type) {
		$imagesFilenames = [];
		
		// First remove the images for the specified animal
		$this->removeImages($request->id, $type);
		
		// Store and add to db
		$images = $request->file($type);
		
		foreach ($images as $index=>$image) {
			// Store the image file
			$extension = $image->extension();
			$fileName = $type.'-'.$request->id.'-'.$index.'.'.$extension;
			
			Storage::disk('public_images')->putFileAs('zoo', $image, $fileName);
			
			// Add to request as string to be added during creation
			array_push($imagesFilenames, $fileName);
		}
		
		return $imagesFilenames;
	}
	
	
	/**
	 * Method to remove images
	 *
	 * @param string $id
	 * @param string $type
	 */
	public function removeImages(string $id, string $type) {
		
		// Get the files to be deleted
		$filesInDir = Storage::disk('public_images')->files('zoo');
		
		$imagesToBeRemoved = array_filter($filesInDir, function ($elem) use ($id, $type) {
			$segments = explode('/', $elem);
			$filenameString = end($segments);
			$filenameSegments = explode('-', $filenameString);
			
			$thisType = $filenameSegments[0];
			$thisId = $filenameSegments[1];
			
			return $thisId === $id && $thisType === $type;
		});
		
		// Delete the files
		Storage::delete($imagesToBeRemoved);
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
			
			case 'details':
				$validationRules = [
					'company_number' => ['required', 'string', 'max:11'],
					'name' => ['required', 'string', 'max:45'],
					'map_image' => isset($data['map_image']) ? ['string'] : [],
					'images' => isset($data['images']) ? ['array'] : [],
					'history' => isset($data['history']) ? ['string'] : [],
				];
				break;
			
			case 'address':
				$validationRules = [
					'city' => ['required', 'string', 'max:45'],
					'county' => ['required', 'string', 'max:45'],
					'postcode' => ['required', 'string', 'max:10'],
					'road_name' => ['required', 'string', 'max:45'],
					'building_number' => ['required', 'string', 'max:45'],
				];
				break;
				
			default: throw new \Error('For validation expected details | address. Instead got: '.$type);
			
		}
		
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
			case 'address':
				return Zoo::class;
			
			default: throw new \Error('Expected details | address. Instead got: '.$type);
		}
	}
}
