<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipBand extends Model
{
	public $incrementing = false;
	protected $keyType = 'string';
	
	public function animals() {
		return $this->hasMany('App\Animal');
	}
}
