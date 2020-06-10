<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
	public $category = 'reviews';
	
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
	 * Show all the events or news records.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list()
	{
		return view('admin.reviews.home', [
			'category' => $this->category,
			'subcategory' => null,
			'model' => $this->getModel(),
			'relations' => $this->getRelations(),
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
	public function delete(Request $request)
	{
		// Convert to array to me able to use method to remove one or more rows
		$ids = explode(',', $request->ids);
		
		$successAlert = sizeof($ids) > 1 ? 'Multiple records deleted successfully' : 'One record deleted successfully';
		
		// Remove the records from the database using destroy()
		call_user_func($this->getModel().'::destroy', $ids);
		
		return redirect(route('admin.reviews.list'))->with('success', $successAlert);
	}
	
	/** Get the relations specific to the model
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations() {
		return ['user', 'sponsor', 'zoo'];
	}
	
	/**
	 * Get a validator for an incoming form request.
	 *
	 * @return string
	 */
	private function getModel()
	{
		return 'App\Models\Review';
	}
}
