<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class AdminLoginForm extends Component
{
	public $loginRoute;
	
	public function __construct(string $loginRoute)
	{
		$this->loginRoute = $loginRoute;
	}
	
	/**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.admin-login-form');
    }
}
