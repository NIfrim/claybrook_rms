<?php

namespace App\View\Components\Birds;

use App\Models\Bird;
use App\View\Components\DefaultTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Table extends DefaultTable
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
    	$rows = $this->getRows(10);
    	
        return view('components.birds.table', [
			'rows' => $rows
		]);
    }
}
