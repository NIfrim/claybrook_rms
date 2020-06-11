<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AnimalMedicalHistoryTable extends DefaultTable
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
		
		return view('components.tables.animal-medical-history-table', [
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
			['name' => 'datetime', 'title' => 'datetime', 'type' => 'datetime-local'],
			['name' => 'incident', 'title' => 'incident report', 'type' => 'text'],
			['name' => 'treatment', 'title' => 'applied treatment', 'type' => 'text'],
		];
		
		return $columns;
	}
}
