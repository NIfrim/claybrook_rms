<?php

namespace App\View\Components\Animals;

use App\View\Components\DefaultTable;

class Table extends DefaultTable
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		$rows = $this->getRows(10);
		
		return view('components.animals.table', [
			'rows' => $rows
		]);
	}
}
