<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietMeal extends Model
{
    protected $casts = [
    	'days' => 'array'
	];
}
