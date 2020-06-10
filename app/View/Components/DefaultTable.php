<?php

namespace App\View\Components;

use App\Models\Bird;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Component;

class DefaultTable extends Component
{
	public $selectable, $model, $relations, $data, $category, $subcategory;
	
	/**
	 * Create a new component instance.
	 *
	 * @param bool $selectable
	 * @param String $model
	 * @param string $category
	 * @param string|null $subcategory
	 * @param array|null $relations
	 */
    public function __construct(bool $selectable, String $model, string $category, ?string $subcategory, ?array $relations)
    {
        $this->selectable = $selectable;
        $this->model = $model;
        $this->relations = $relations;
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // Override with own implementation;
    }
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @param array|null $filters
	 *
	 * @return array
	 */
    protected function getRows(?array $filters = null) {
    	
    	/* Get the rows for specific model */
		if ($filters) {
			
			$rows = call_user_func($this->getFunction(), $this->relations)->where($filters)->get();
			
		} else if ($this->relations) {
			
			$rows = call_user_func($this->getFunction(), $this->relations)->get();
			
		} else {
			
			$rows = call_user_func($this->getFunction())->get();
		}

    	return $rows;
	}
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return array
	 */
	protected function getColumns() {
    	$columns = [];
    	
    	return $columns;
	}
	
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return String
	 */
	private function getFunction() {
    	return $this->model.'::'.($this->relations ? 'with' : 'all');
	}
}
