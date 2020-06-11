<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class ZooAddressForm extends DefaultForm
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.zoo-address-form', [
			'data' => $this->data,
			'formType' => $this->formType,
			'route' => route('admin.zoo.submit', ['type' => 'address', 'formType' => $this->formType])
		]);
    }
}
