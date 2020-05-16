<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public function zoo() {
		return $this->belongsTo('App\Models\Zoo');
	}
	
	public function eventCategory() {
		return $this->belongsTo('App\Models\EventCategory', 'category_id');
	}
}
