<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalHabitat extends Model
{
	public function animals() {
		return $this->hasMany('App\Animal', 'habitat_id');
	}
}
