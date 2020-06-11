<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class RowTypeOne extends Component
{
	public $type, $title, $rowData, $cardsData;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $type
	 * @param string $title
	 * @param object $cardsData
	 */
    public function __construct(string $type, string $title, ?object $cardsData = null)
    {
        $this->type = $type;
        $this->title = $title;
        $this->cardsData = $cardsData;
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
}
