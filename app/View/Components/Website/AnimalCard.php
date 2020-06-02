<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class AnimalCard extends Component
{
	public $title, $sponsor, $image;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $title
	 * @param array $sponsor
	 * @param string $image
	 */
	public function __construct(string $title, array $sponsor, string $image)
	{
		$this->title = $title;
		$this->sponsor = $sponsor;
		$this->image = $image;
	}
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.website.animal-card');
	}
}
