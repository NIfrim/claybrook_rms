<?php

namespace App\View\Components\Website;

use Illuminate\View\Component;

class NewsCard extends Component
{
	public $title, $datePosted, $dateExpire, $shortDescription, $image;
	
	/**
	 * Create a new component instance.
	 *
	 * @param string $title
	 * @param string $datePosted
	 * @param string $dateExpire
	 * @param string $shortDescription
	 * @param string|null $image
	 */
	public function __construct(string $title, string $datePosted, string $dateExpire, string $shortDescription, ?string $image = null)
	{
		$this->title = $title;
		$this->datePosted = $datePosted;
		$this->dateExpire = $dateExpire;
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
		return view('components.website.news-card');
	}
}
