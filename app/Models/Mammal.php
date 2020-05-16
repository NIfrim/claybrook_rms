<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mammal extends Model
{
	public function animal() {
		return $this->belongsTo('App\Models\Animal');
	}
}
