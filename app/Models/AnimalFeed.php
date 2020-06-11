<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalFeed extends Model
{
	public function dietMeals() {
		return $this->hasMany('App\Models\DietMeal');
	}
}
