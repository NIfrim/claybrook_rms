<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class RowTypeTwo extends Component
{
	public $type, $title, $cardsData, $otherData, $action, $single;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $type
	 * @param string $title
	 * @param object|null $otherData
	 * @param object $cardsData
	 * @param bool|null $single
	 * @param string|null $action
	 */
	public function __construct(string $type, string $title, ?object $otherData = null, ?object $cardsData = null, ?bool $single = false, ?string $action = null)
	{
		$this->type = $type;
		$this->action = $action;
		$this->cardsData = $cardsData;
		$this->title = $title;
		$this->single = $single;
		$this->otherData = $otherData;
	}
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.website.row-type-two');
	}
}
