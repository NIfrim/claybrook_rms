<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class AnimalsTable extends DefaultTable
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		$rows = $this->getRows(10);
		
		return view('components.tables.animals-table', [
			'columns' => [
				['name' => 'id', 'title' => 'id', 'type' => 'text'],
				['name' => 'location_id', 'title' => 'location', 'type' => 'text'],
				['name' => 'classification', 'title' => 'classification', 'type' => 'text'],
				['name' => 'name', 'title' => 'name', 'type' => 'text'],
				['name' => 'diet', 'title' => 'diet', 'type' => 'text'],
				['name' => 'dob', 'title' => 'date of birth', 'type' => 'date'],
				['name' => 'sponsorship_band_id', 'title' => 'sponsorship band', 'type' => 'text'],
			],
			'rows' => $rows,
			'params' => request()->except('page'),
		]);
	}
}
