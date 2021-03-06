<?php

namespace App\View\Components\Sponsor;

use App\View\Components\DefaultForm;

class ProfileForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.sponsor.profile-form', [
				'data' => $this->data,
				'formType' => $this->formType,
				'route' => route('sponsor.profile.submit', ['type' => 'details', 'formType' => $this->formType])
			]
		);
	}
}
