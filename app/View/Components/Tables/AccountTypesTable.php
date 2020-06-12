<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AccountTypesTable extends DefaultTable
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
		
		return view('components.tables.account-types-table', [
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
			['name' => 'name', 'title' => 'name', 'type' => 'text'],
			['name' => 'permissions', 'title' => 'permissions', 'type' => 'text'],
		];
		
		return $columns;
	}
}
