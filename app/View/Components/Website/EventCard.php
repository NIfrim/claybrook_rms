<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class EventCard extends Component
{
	public $id, $title, $startDate, $endDate, $shortDescription, $image;
	
	/**
	 * Create a new component instance.
	 *
	 * @param int $id
	 * @param string $title
	 * @param string $startDate
	 * @param string $endDate
	 * @param string $shortDescription
	 * @param string|null $image
	 */
    public function __construct(int $id, string $title, string $startDate, string $endDate, string $shortDescription, ?string $image = null)
    {
		$this->id = $id;
        $this->title = $title;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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
        return view('components.website.event-card');
    }
}
