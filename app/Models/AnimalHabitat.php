<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalHabitat extends Model
{
	public function animals() {
		return $this->hasMany('App\Models\Animal', 'habitat_id');
	}
}
