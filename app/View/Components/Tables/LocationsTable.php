<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class LocationsTable extends DefaultTable
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		$filters = [
			['location_type', '=', $this->subcategory]
		];
		$rows = $this->getRows($filters);
		$columns = $this->getColumns();
		
		return view('components.tables.locations-table', [
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
			['name' => 'zoo_id', 'title' => 'zoo id', 'type' => 'number'],
			['name' => 'location_name', 'title' => 'name', 'type' => 'text'],
			['name' => 'vacant', 'title' => 'vacant', 'type' => 'text'],
			['name' => 'surface_area', 'title' => 'surface area', 'type' => 'text'],
			['name' => 'location_description', 'title' => 'description', 'type' => 'text'],
		];
		
		return $columns;
	}
}
