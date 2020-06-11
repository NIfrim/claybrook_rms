<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AnimalWatchlistHistoryTable extends DefaultTable
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		$rows = $this->getRows();
		$columns = $this->getColumns();
		
		return view('components.tables.animal-watchlist-history-table', [
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'rows' => $rows,
			'columns' => $columns,
		]);
	}
	
	protected function getColumns()
	{
		$columns = [
			['name' => 'id', 'title' => 'ID', 'type' => 'number'],
			['name' => 'animal_id', 'title' => 'animal ID', 'type' => 'text'],
			['name' => 'start', 'title' => 'start', 'type' => 'datetime-local'],
			['name' => 'end', 'title' => 'end', 'type' => 'datetime-local'],
			['name' => 'reason', 'title' => 'reason for watch', 'type' => 'text'],
		];
		
		return $columns;
	}
}
