<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class AccountTypeForm extends DefaultForm
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.account-type-form', [
			'data' => $this->data,
			'formType' => $this->formType,
			'route' => route('admin.employees.submit', ['type' => 'accountTypes', 'formType' => $this->formType])
		]);
    }
}
