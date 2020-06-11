<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;
use Illuminate\View\Component;

class SponsorshipBandsForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.forms.sponsorship-bands-form', [
				'data' => $this->data,
				'formType' => $this->formType,
				'route' => route('admin.sponsors.submit', ['type' => 'sponsorshipBands', 'formType' => $this->formType])
			]
		);
	}
}
