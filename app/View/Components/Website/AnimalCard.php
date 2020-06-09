<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class AnimalCard extends Component
{
	public $id, $title, $sponsor, $image, $type, $data;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $type
	 * @param string $title
	 * @param object $data
	 */
	public function __construct(string $type, string $title, object $data)
	{
		$this->id = $data->id;
		$this->title = $title;
		$this->sponsor = isset($data->sponsor) ? $data->sponsor->first_name.' - '.$data->sponsor->last_name : 'No Sponsor';
		$this->image = $data->images ? $data->images[0] : null;
		$this->type = $type;
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
