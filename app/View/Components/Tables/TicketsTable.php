<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class TicketsTable extends DefaultTable
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
		
		return view('components.tables.tickets-table', [
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
			['name' => 'type', 'title' => 'type', 'type' => 'text'],
			['name' => 'price_online', 'title' => 'online price', 'type' => 'numeric'],
			['name' => 'price_gate', 'title' => 'gate price', 'type' => 'numeric'],
		];
		
		return $columns;
	}
}
