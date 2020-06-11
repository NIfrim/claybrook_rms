<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Pass;
use App\Models\Ticket;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TicketsAndPassesController extends Controller
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
		
		return view('website.tickets-and-passes.home', [
			'title' => 'Tickets and Passes',
			'category' => $category,
			'subcategory' => $subcategory,
			'tickets' => $this->getData('tickets'),
			'passes' => $this->getData('passes'),
			'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']]),
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
			case 'tickets':
				return Ticket::class;
				
			case 'passes':
				return Pass::class;
				
			case 'zoos':
				return Zoo::class;
				
			default: throw new \Error('Missing model name');
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
