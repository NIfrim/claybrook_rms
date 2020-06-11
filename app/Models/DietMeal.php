<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietMeal extends Model
{
    protected $casts = [
    	'days' => 'array'
	];
    
    public function animalFeed() {
    	return $this->belongsTo('App\Models\AnimalFeed');
	}
	
	public function animalDiet() {
		return $this->belongsTo('App\Models\AnimalDiet', 'diet_id');
	}
}
