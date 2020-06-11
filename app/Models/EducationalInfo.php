<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
	public function animals() {
		return $this->hasMany('App\Models\Animal');
	}
}
