<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class AttractionCard extends Component
{
	public $name, $type, $id, $endDate, $shortDescription, $image;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $name
	 * @param string $type
	 * @param string $id
	 * @param string $shortDescription
	 * @param string|null $image
	 */
	public function __construct(string $id, string $name, string $type, string $shortDescription, ?string $image = null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->type = $type;
		$this->shortDescription = $shortDescription;
		$this->image = $image;
	}
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.website.attraction-card');
	}
}
