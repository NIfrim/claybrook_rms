<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	protected $keyType = 'string';
	public $incrementing = false;
	
	public function location() {
		return $this->belongsTo('App\Location');
	}
	
	public function animalDiets() {
		return $this->hasMany('App\AnimalDiet');
	}
	
	public function educationalInfo() {
		return $this->belongsTo('App\EducationalInfo');
	}
	
	public function animalHabitat() {
		return $this->belongsTo('App\AnimalHabitat');
	}
	
	public function sponsorshipBand() {
		return $this->belongsTo('App\SponsorshipBand');
	}
}
