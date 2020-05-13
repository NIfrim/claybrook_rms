<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
	public function animal() {
		return $this->belongsTo('App\Animal');
	}
}
