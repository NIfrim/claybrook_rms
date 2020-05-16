<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public $incrementing = false;
	protected $keyType = 'string';

	public function zoo() {
		return $this->belongsTo('App\Models\Zoo');
	}
	
	public function animals() {
		return $this->hasMany('App\Models\Animal');
	}
}
