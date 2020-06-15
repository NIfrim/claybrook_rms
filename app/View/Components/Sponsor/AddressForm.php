<?php

namespace App\View\Components\Sponsor;

use App\View\Components\DefaultForm;

class AddressForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.sponsor.address-form', [
				'data' => $this->data,
				'formType' => $this->formType,
				'route' => route('sponsor.profile.submit', ['type' => 'address', 'formType' => $this->formType])
			]
		);
	}
}
