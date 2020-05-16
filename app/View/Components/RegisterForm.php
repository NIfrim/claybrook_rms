<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterForm extends Component
{
	public $userType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $userType)
    {
        $this->userType = $userType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.register-form');
    }
}
