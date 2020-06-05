<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventsCategory;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EventsController extends Controller
{
	/**
	 * Show the events section
	 *
	 * @param int|null $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(?int $id = null)
	{
		$url = explode('/', $_SERVER['REQUEST_URI']);
		$category = $url[1];
		$subcategory = $url[2];
		
		if ($id) {
			
			return view('website.events.single', [
				'category' => $category,
				'subcategory' => $subcategory,
				'event' => $this->getData('events', [['id', '=', $id]])->first(),
				'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])->first(),
			]);
			
		} else {
			
			return view('website.events.home', [
				'title' => 'Current Events',
				'category' => $category,
				'subcategory' => $subcategory,
				'eventsCategories' => $this->getData('events_categories'),
				'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])->first(),
			]);
			
		}
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
	 * @return String|null
	 */
	private function getModel(string $table) {
		
		switch ($table) {
			case 'events':
				return Event::class;
			
			case 'events_categories':
				return EventsCategory::class;
			
			case 'zoos':
				return Zoo::class;
			
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
			case 'event_categories':
				return ['events'];
			
			case 'events':
				return ['eventCategory'];
			
			default: return [];
		}
	}
}
