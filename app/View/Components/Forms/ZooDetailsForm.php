<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class ZooDetailsForm extends DefaultForm
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.zoo-details-form', [
			'data' => $this->data,
			'formType' => $this->formType,
			'route' => route('admin.zoo.submit', ['type' => $this->data['type'], 'formType' => $this->formType])
		]);
    }
}
