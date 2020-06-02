<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class RowTypeTwo extends Component
{
	public $type, $title, $cardsData;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $type
	 * @param array $cardsData
	 */
	public function __construct(string $type, array $cardsData)
	{
		$this->type = $type;
		$this->cardsData = $cardsData;
		$this->title = $this->getTitle($type);
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
	
	private function getTitle(string $type) {
		switch ($type) {
			case 'birds': return 'Some of our birds';
			case 'mammals': return 'Some of our mammals';
			case 'fish': return 'Some of our fishes';
			case 'reptiles': return 'Some of our reptiles';
			default: return 'Missing title';
		}
	}
}
