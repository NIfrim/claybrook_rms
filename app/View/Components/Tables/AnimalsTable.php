<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AnimalsTable extends DefaultTable
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		$rows = $this->getRows(null);
		$columns = $this->getColumns();
		
		return view('components.tables.animals-table', [
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'rows' => $rows,
			'columns' => $columns,
		]);
	}
	
	protected function getColumns()
	{
		$columns = [
			['name' => 'id', 'title' => 'id', 'type' => 'text'],
			['name' => 'location_id', 'title' => 'location', 'type' => 'text'],
			['name' => 'classification', 'title' => 'classification', 'type' => 'text'],
			['name' => 'species', 'title' => 'specie', 'type' => 'text'],
			['name' => 'type', 'title' => 'type', 'type' => 'text'],
			['name' => 'name', 'title' => 'name', 'type' => 'text'],
			['name' => 'date_joined', 'title' => 'date joined', 'type' => 'date'],
			['name' => 'dob', 'title' => 'date of birth', 'type' => 'date'],
			['name' => 'gender', 'title' => 'gender', 'type' => 'text'],
			['name' => 'height_joined', 'title' => 'height joined', 'type' => 'number'],
			['name' => 'weight_joined', 'title' => 'weight joined', 'type' => 'number'],
			['name' => 'diet', 'title' => 'diet', 'type' => 'text'],
			['name' => 'sponsorship_band_id', 'title' => 'sponsorship band', 'type' => 'text'],
		];
		
		// Add subcategory related columns
		switch ($this->subcategory) {
			case 'birds':
				array_push($columns, ['name' => 'nest_construction', 'title' => 'nest construction', 'type' => 'text']);
				array_push($columns, ['name' => 'clutch_size', 'title' => 'clutch size', 'type' => 'number']);
				array_push($columns, ['name' => 'can_fly', 'title' => 'can fly', 'type' => 'text']);
				array_push($columns, ['name' => 'plumage', 'title' => 'plumage', 'type' => 'text']);
				break;
			
			case 'fishes':
				array_push($columns, ['name' => 'average_body_temperature', 'title' => 'average body temp', 'type' => 'number']);
				array_push($columns, ['name' => 'water_type', 'title' => 'water type', 'type' => 'text']);
				array_push($columns, ['name' => 'colour', 'title' => 'colour', 'type' => 'text']);
				break;
			
			case 'mammals':
				array_push($columns, ['name' => 'gestational_period', 'title' => 'gestational period', 'type' => 'number']);
				array_push($columns, ['name' => 'offspring_number', 'title' => 'offspring', 'type' => 'number']);
				break;
			
			case 'reptiles':
				array_push($columns, ['name' => 'reproduction_type', 'title' => 'reproduction type', 'type' => 'text']);
				array_push($columns, ['name' => 'clutch_size', 'title' => 'clutch size', 'type' => 'number']);
				array_push($columns, ['name' => 'offspring_number', 'title' => 'offspring', 'type' => 'number']);
				break;
			
			default: break;
		}
		
		return $columns;
	}
}
