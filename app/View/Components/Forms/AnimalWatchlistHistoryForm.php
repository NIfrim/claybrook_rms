<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;
use Illuminate\View\Component;

class AnimalWatchlistHistoryForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.forms.animal-watchlist-history-form', [
			'data' => $this->data,
			'formType' => $this->formType,
			'route' => route('admin.animals.submit', ['type' => $this->data['type'], 'formType' => $this->formType])
		]);
	}
}
