<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietMeal extends Model
{
    protected $casts = [
    	'days' => 'array'
	];
    
    public function animalFeed() {
    	return $this->belongsTo('App\AnimalFeed');
	}
	
	public function animalDiet() {
		return $this->belongsTo('App\AnimalDiet', 'diet_id');
	}
}
