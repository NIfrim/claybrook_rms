<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsCategory extends Model
{
	protected $fillable = [
		'name',
		'title',
		'short_description',
		'long_description',
		'image'
	];
	
	public function events() {
		return $this->hasMany('App\Models\Event', 'category_id');
	}
}
