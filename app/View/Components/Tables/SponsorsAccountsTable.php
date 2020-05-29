<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class SponsorsAccountsTable extends DefaultTable
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
		
		return view('components.tables.sponsors-accounts-table', [
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
			['name' => 'title', 'title' => 'title', 'type' => 'text'],
			['name' => 'full_name', 'title' => 'full name', 'type' => 'text'],
			['name' => 'job_title', 'title' => 'job', 'type' => 'text'],
			['name' => 'email', 'title' => 'email', 'type' => 'email'],
			['name' => 'primary_contact_number', 'title' => 'primary contact', 'type' => 'text'],
			['name' => 'secondary_contact_number', 'title' => 'secondary contact', 'type' => 'text'],
			['name' => 'address', 'title' => 'address', 'type' => 'text'],
			['name' => 'active', 'title' => 'active', 'type' => 'number'],
		];
		
		return $columns;
	}
}
