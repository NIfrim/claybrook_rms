<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebLoginForm extends Component
{
		public $loginRoute;
		
		/**
		 * Create a new component instance.
		 *
		 * @param String $loginRoute
		 */
		public function __construct(String $loginRoute)
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
				return view('components.web-login-form');
		}
}
