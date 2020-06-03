<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class Carousel extends Component
{
	public $images, $category;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $category
	 * @param array|null $images
	 */
    public function __construct(string $category, ?array $images = null)
    {
        $this->category = $category;
        $this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.website.carousel');
    }
}
