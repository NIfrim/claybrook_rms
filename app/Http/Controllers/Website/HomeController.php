<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Event;
use App\Models\EventsCategory;
use App\Models\News;
use App\Models\NewsCategory;
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
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$category = $url[1];
		$subcategory = $url[2] ?? null;
		
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
			'zoo' => ['name' => 'Claybrook Zoo', 'address' => ['building_number' => '45', 'road_name' => 'Zoo Lane', 'city' => 'Eastlands', 'county' => 'North Yorkshire', 'postcode' => 'YR123TH'], 'company_number' => 211545],
		]);
	}
	
	/** Returns zoo information
	 */
	private function getZoo() {
		return ['name' => 'Claybrook Zoo', 'address' => ['building_number' => '45', 'road_name' => 'Zoo Lane', 'city' => 'Eastlands', 'county' => 'North Yorkshire', 'postcode' => 'YR123TH'], 'company_number' => 211545];
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
			case 'animals':
				return ['sponsor'];
			
			case 'news_categories':
				return ['news'];
			
			case 'events_categories':
				return ['events'];
			
			default: return [];
		}
	}
}
