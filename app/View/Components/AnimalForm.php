<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnimalForm extends Component
{
	public $data, $type;
	
	/**
	 * Create a new component instance.
	 *
	 * @param array|null $data
	 * @param String $type
	 */
    public function __construct(?Array $data, String $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.animal-details-form', [
        	'data' => $this->data,
			'type' => $this->type
			]
		);
    }
}
