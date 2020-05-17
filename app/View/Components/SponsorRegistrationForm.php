<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SponsorRegistrationForm extends Component
{
		public $registerRoute;
		
		/**
		 * Create a new component instance.
		 *
		 * @param String $registerRoute
		 */
		public function __construct(String $registerRoute)
		{
				$this->registerRoute = $registerRoute;
		}
		
		/**
		 * Get the view / contents that represent the component.
		 *
		 * @return \Illuminate\View\View|string
		 */
		public function render()
		{
				return view('components.sponsor-registration-form');
		}
}
