<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public function zoo() {
		return $this->belongsTo('App\Zoo');
	}
	
	public function eventCategory() {
		return $this->belongsTo('App\EventCategory', 'category_id');
	}
}
