<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class RowTypeOne extends Component
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
        return view('components.website.row-type-one');
    }
    
    private function getTitle(string $type) {
    	switch ($type) {
			case 'events': return 'Upcoming Events';
			case 'animalSpotlight': return 'Animal Spotlight';
			default: return 'Missing title';
		}
	}
}
