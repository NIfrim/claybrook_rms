<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;
use Illuminate\View\Component;

class SponsorshipBandsTable extends DefaultTable
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
		
		return view('components.tables.sponsorship-bands-table', [
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
			['name' => 'band', 'title' => 'band', 'type' => 'text'],
			['name' => 'price', 'title' => 'price', 'type' => 'number'],
			['name' => 'duration', 'title' => 'duration', 'type' => 'text'],
		];
		
		return $columns;
	}
}
