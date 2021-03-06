<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultForm extends Component
{
	public  $formType; // new|edit
	public  $data; // Data for the form if editing
	public  $category; // The type of data within the form (animals, sponsors, ...)
	public  $subcategory; // The type of data within the form for subtypes (animals -> mammals, ...)
	public 	$title; // The form title
	public $subcategory2; // Extra subcategory like medical history for animals
	
	/**
	 * Create a new component instance.
	 *
	 * @param String $formType
	 * @param object|null $data
	 * @param string $category
	 * @param string|null $subcategory
	 * @param string|null $subcategory2
	 * @param string $title
	 */
    public function __construct(String $formType, $data, string $category, ?string $subcategory, string $title, ?string $subcategory2 = null)
    {
        $this->formType = $formType;
        $this->data = $data ?? null;
        $this->category = $category;
        $this->subcategory = $subcategory ?? null;
        $this->subcategory2 = $subcategory2;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       // Override implementation in extended class
    }
}
