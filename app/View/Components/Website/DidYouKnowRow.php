<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class DidYouKnowRow extends Component
{
	public $title, $message;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $title
	 * @param string $message
	 */
	public function __construct(string $title, ?string $message = null)
	{
		$this->title = $title;
		$this->message = $message;
	}
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.website.did-you-know-row');
	}
}
