<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AgreementsSignageTable extends DefaultTable
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
		
		return view('components.tables.agreements-signage-table', [
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
			['name' => 'animal_id', 'title' => 'animal id', 'type' => 'number'],
			['name' => 'agreement_id', 'title' => 'agreement id', 'type' => 'number'],
			['name' => 'status', 'title' => 'status', 'type' => 'text'],
			['name' => 'reason', 'title' => 'reason', 'type' => 'text'],
			['name' => 'image_file_name', 'title' => 'image', 'type' => 'text'],
		];
		
		return $columns;
	}
}
