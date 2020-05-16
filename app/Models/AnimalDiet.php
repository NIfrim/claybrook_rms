<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalDiet extends Model
{
	public function dietMeals() {
		return $this->hasMany('App\Models\DietMeal', 'diet_id');
	}
	
	public function animal() {
		return $this->belongsTo('App\Models\Animal');
	}
	
	public function animalFeed() {
		return $this->belongsTo('App\Models\AnimalFeed');
	}
}
