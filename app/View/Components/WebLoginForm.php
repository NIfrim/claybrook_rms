<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebLoginForm extends Component
{
		public $title, $loginRoute;
		
		/**
		 * Create a new component instance.
		 *
		 * @param String $title
		 * @param String $loginRoute
		 */
		public function __construct(String $title, String $loginRoute)
		{
				$this->title = $title;
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
