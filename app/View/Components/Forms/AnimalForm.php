<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class AnimalForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.forms.animal-form', [
				'data' => $this->data,
				'formType' => $this->formType,
				'route' => route('admin.animals.submit', ['type' => 'birds', 'formType' => $this->formType])
			]
		);
	}
}
