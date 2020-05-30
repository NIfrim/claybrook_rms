<?php

namespace App\View\Components\Tables;

use App\View\Components\DefaultTable;

class ReviewsTable extends DefaultTable
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
		
		return view('components.tables.reviews-table', [
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
			['name' => 'sponsor_id', 'title' => 'sponsor id', 'type' => 'number'],
			['name' => 'user_id', 'title' => 'user id', 'type' => 'number'],
			['name' => 'posted_by', 'title' => 'posted by', 'type' => 'text'],
			['name' => 'title', 'title' => 'title', 'type' => 'text'],
			['name' => 'review', 'title' => 'review contact', 'type' => 'text'],
			['name' => 'reaction', 'title' => 'reaction', 'type' => 'number'],
			['name' => 'posted', 'title' => 'posted on', 'type' => 'datetime-local'],
		];
		
		return $columns;
	}
}
