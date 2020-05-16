<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
	public function animal() {
		return $this->belongsTo('App\Models\Animal');
	}
}
