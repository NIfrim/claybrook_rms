<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class EventsCategoriesTable extends DefaultTable
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
		
		return view('components.tables.events-categories-table', [
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
			['name' => 'title', 'title' => 'title', 'type' => 'text'],
			['name' => 'short_description', 'title' => 'short description', 'type' => 'text'],
			['name' => 'long_description', 'title' => 'long description', 'type' => 'text'],
		];
		
		return $columns;
	}
}
