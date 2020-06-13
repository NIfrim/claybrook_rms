<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Event;
use App\Models\EventsCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
	/**
	 * Show the animals section based on specified type.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show()
	{
		return view('website.welcome', [
			'title' => 'Welcome to Claybrook Zoo',
			'animals' => $this->getData('animals', [
				['on_website', '=', 'Y'],
				['in_spotlight', '=', 'Y']
			]),
			'eventsCategories' => $this->getData('events_categories'),
			'newsCategories' => $this->getData('news_categories'),
			'category' => 'home',
			'subcategory' => null,
			'zoo' => $this->getData('zoos',[['id', '=', 1]])->first(),
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
	 * @param String $type
	 *
	 * @return String|null
	 */
	private function getModel(string $type) {
		switch ($type) {
			case 'zoos':
				return Zoo::class;
				
			case 'animals':
				return Animal::class;
				
			case 'events':
				return Event::class;
				
			case 'news':
				return News::class;
			
			case 'events_categories':
				return EventsCategory::class;
			
			case 'news_categories':
				return NewsCategory::class;
				
			default: return null;
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
