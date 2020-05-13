<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bird extends Model
{
	public function animal() {
		return $this->belongsTo('App\Animal');
	}
}
