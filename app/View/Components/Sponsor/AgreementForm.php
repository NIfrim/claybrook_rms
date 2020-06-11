<?php

namespace App\View\Components\Sponsor;

use App\View\Components\DefaultForm;

class AgreementForm extends DefaultForm
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sponsor.agreement-form', [
			'data' => $this->data,
			'formType' => $this->formType,
			'route' => route('sponsor.agreements.submit', ['type' => 'sponsor_agreements', 'formType' => $this->formType])
		]);
    }
}
