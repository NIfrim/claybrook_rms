<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class SponsorsAgreementsForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.forms.sponsors-agreements-form', [
				'data' => $this->data,
				'formType' => $this->formType,
				'route' => route('admin.sponsors.submit', ['type' => 'agreements', 'formType' => $this->formType])
			]
		);
	}
}
