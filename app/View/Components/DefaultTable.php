<?php

namespace App\View\Components;

use App\Models\Bird;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Component;

class DefaultTable extends Component
{
	public $selectable, $model, $relations, $data;
	
	/**
	 * Create a new component instance.
	 *
	 * @param bool $selectable
	 * @param String $model
	 * @param array|null $relations
	 */
    public function __construct(bool $selectable, String $model, ?array $relations)
    {
        $this->selectable = $selectable;
        $this->model = $model;
        $this->relations = $relations;
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
	 * @param int $amountPerPage
	 *
	 * @return array
	 */
//	@todo Make the function return rows based on dynamic filters
    protected function getRows(int $amountPerPage) {
    	
    	/* Get the paginated rows for specific model */
    	if ($this->relations) {
			$rows = call_user_func($this->getFunction(), $this->relations)->paginate($amountPerPage);
		} else {
			$rows = call_user_func($this->getFunction(), $amountPerPage);
		}
    	
    	return $rows;
	}
	
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return String
	 */
	private function getFunction() {
    	return $this->model.'::'.($this->relations ? 'with' : 'paginate');
	}
	
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 *
	 * @return array
	 */
	private function getPossibleFilters(Model $model) {
    	$possibleFilters = [];
		
		/* Get the relations of the model and merge */
    	$relations = $model->getAttributes();
		array_merge($possibleFilters, $relations);
    	
    	/* Retrieve all of the attributes and merge */
    	if (sizeof($relations) > 0) {
			foreach ($relations as $relation) {
				$relationAttributes = call_user_func('App\Models\\'.ucfirst($relation).'::getAttributes');
				array_merge($possibleFilters, $relationAttributes);
			}
		}
  
  		dd($possibleFilters);
    	return $possibleFilters;
	}
}
