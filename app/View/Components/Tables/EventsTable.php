<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class EventsTable extends DefaultTable
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
		
		return view('components.tables.events-table', [
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
			['name' => 'category_id', 'title' => 'category id', 'type' => 'number'],
			['name' => 'title', 'title' => 'title', 'type' => 'text'],
			['name' => 'start_date', 'title' => 'starts', 'type' => 'date'],
			['name' => 'end_date', 'title' => 'ends', 'type' => 'date'],
			['name' => 'repeat', 'title' => 'repeats', 'type' => 'text'],
			['name' => 'short_description', 'title' => 'short description', 'type' => 'text'],
			['name' => 'long_description', 'title' => 'long description', 'type' => 'text'],
		];
		
		return $columns;
	}
}
