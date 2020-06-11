<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AttractionsTable extends DefaultTable
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
		
		return view('components.tables.attractions-table', [
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'rows' => $rows,
			'columns' => $columns,
		]);
	}
	
	protected function getColumns()
	{
		$columns = [
			['name' => 'id', 'title' => 'id', 'type' => 'number'],
			['name' => 'zoo_id', 'title' => 'zoo id', 'type' => 'number'],
			['name' => 'name', 'title' => 'name', 'type' => 'text'],
			['name' => 'type', 'title' => 'type', 'type' => 'text'],
			['name' => 'for', 'title' => 'suitable for', 'type' => 'text'],
			['name' => 'ride_intensity', 'title' => 'ride intensity', 'type' => 'text'],
			['name' => 'minimum_height', 'title' => 'min. height', 'type' => 'text'],
			['name' => 'short_description', 'title' => 'short description', 'type' => 'text'],
		];
		
		return $columns;
	}
}
