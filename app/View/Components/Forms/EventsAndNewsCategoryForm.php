<?php

namespace App\View\Components\Forms;

use App\View\Components\DefaultForm;

class EventsAndNewsCategoryForm extends DefaultForm
{
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.forms.events-and-news-category-form', [
				'data' => $this->data,
				'formType' => $this->formType,
			]
		);
	}
}
