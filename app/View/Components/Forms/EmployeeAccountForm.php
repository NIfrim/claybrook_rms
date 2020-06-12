<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class EmployeeAccountForm extends DefaultForm
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.employee-account-form', [
			'data' => $this->data,
			'formType' => $this->formType,
			'route' => route('admin.employees.submit', ['type' => 'accounts', 'formType' => $this->formType])
		]);
    }
}
