<?php

namespace App\View\Components\Sponsor;

use App\View\Components\DefaultTable;
use Illuminate\Support\Facades\Auth;

class AgreementsTable extends DefaultTable
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		$rows = $this->getRows([['id', '=', Auth::guard('sponsor')->id()]])->first();
		$columns = $this->getColumns();
		
		return view('components.sponsor.agreements-table', [
			'category' => $this->category,
			'subcategory' => $this->subcategory,
			'rows' => $rows->sponsorAgreements,
			'columns' => $columns,
		]);
	}
	
	protected function getColumns()
	{
		$columns = [
			['name' => 'id', 'title' => 'id', 'type' => 'number'],
			['name' => 'date', 'title' => 'date signed', 'type' => 'date'],
			['name' => 'agreement_start', 'title' => 'starts on', 'type' => 'date'],
			['name' => 'agreement_end', 'title' => 'ends on', 'type' => 'date'],
			['name' => 'signage_area', 'title' => 'signage space', 'type' => 'number'],
			['name' => 'payment_status', 'title' => 'payment', 'type' => 'text'],
		];
		
		return $columns;
	}
}
