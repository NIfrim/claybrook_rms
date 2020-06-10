<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class RowTypeThree extends Component
{
	public $title, $message, $category;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $title
	 * @param string $message
	 * @param string|null $category
	 */
	public function __construct(string $title, ?string $message = null, ?string $category = null)
	{
		$this->category = $category;
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
		return view('components.website.row-type-three');
	}
}
