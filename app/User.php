<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public function zoo() {
		return $this->belongsTo('App\Zoo');
	}
	
	public function reviews() {
		return $this->hasMany('App\Review');
	}
}
