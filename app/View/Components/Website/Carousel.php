<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class Carousel extends Component
{
	public $data, $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.website.carousel', ['data' => $this->data]);
    }
}
