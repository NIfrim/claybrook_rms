<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalDiet extends Model
{
	public function dietMeals() {
		return $this->hasMany('App\DietMeal', 'diet_id');
	}
	
	public function animal() {
		return $this->belongsTo('App\Animal');
	}
	
	public function animalFeed() {
		return $this->belongsTo('App\AnimalFeed');
	}
}
