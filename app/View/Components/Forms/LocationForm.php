<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class LocationForm extends DefaultForm
{
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.forms.location-form', [
				'data' => $this->data,
				'formType' => $this->formType,
				'route' => route('admin.locations.submit', ['type' => $this->data['type'], 'formType' => $this->formType])
			]
		);
	}
}
