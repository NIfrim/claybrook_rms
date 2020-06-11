<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	/**
	 * Show the opening times section
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
			
			return view('website.news.single', [
				'category' => $category,
				'subcategory' => $subcategory,
				'news' => $this->getData('news', [['id', '=', $id]])->first(),
				'zoo' => $this->getData('zoos', [['name', '=', 'Claybrook Zoo']])->first(),
			]);
			
		} else {
			
			return view('website.news.home', [
				'title' => 'Current News',
				'category' => $category,
				'subcategory' => $subcategory,
				'newsCategories' => $this->getData('news_categories'),
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
			case 'news':
				return News::class;
			
			case 'news_categories':
				return NewsCategory::class;
				
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
			case 'news_categories':
				return ['news'];
			
			case 'news':
				return ['newsCategory'];
			
			default: return [];
		}
	}
}
