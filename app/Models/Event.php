<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'zoo_id',
		'category_id',
		'title',
		'start_date',
		'end_date',
		'repeat',
		'short_description',
		'long_description',
		'image',
	];
	
	public function zoo() {
		return $this->belongsTo('App\Models\Zoo');
	}
	
	public function eventCategory() {
		return $this->belongsTo('App\Models\EventsCategory', 'category_id');
	}
}
