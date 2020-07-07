<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\SponsorshipBand;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BecomeASponsorController extends Controller
{
	/**
	 * Show the opening times section
	 *
	 * @param string|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(?string $id = null)
	{
		
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$category = $url[1];
		$subcategory = $url[2] ?? null;
		
		return view('website.become-a-sponsor.home', [
			'title' => 'Become a sponsor',
			'category' => $category,
			'subcategory' => $subcategory,
			'sponsorshipBands' => $this->getData('sponsorship_bands'),
			'zoo' => $this->getData('zoos', [['id', '=', 1]])->first(),
		]);
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
	
	/** Returns the model used for getting the data
	 *
	 * @param string $model
	 *
	 * @return String|null
	 */
	private function getModel(string $model) {
		switch ($model) {
			case 'zoos': return Zoo::class;
			case 'sponsorship_bands': return SponsorshipBand::class;
			default: throw new \Error('Cannot get model for: '.$model);
		}
	}
	
	/** Returns the model used for getting the data
	 *
	 * @param String $type
	 *
	 * @return array
	 */
	private function getRelations(string $type) {
		switch ($type) {
			
			default: return [];
		}
	}
}
