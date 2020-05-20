<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Animal extends Model
{
	protected $keyType = 'string';
	public $incrementing = false;
	
	public function location() {
		return $this->belongsTo('App\Models\Location');
	}
	
	public function animalDiets() {
		return $this->hasMany('App\Models\AnimalDiet');
	}
	
	public function educationalInfo() {
		return $this->belongsTo('App\Models\EducationalInfo');
	}
	
	public function animalHabitat() {
		return $this->belongsTo('App\Models\AnimalHabitat');
	}
	
	public function sponsorshipBand() {
		return $this->belongsTo('App\Models\SponsorshipBand');
	}
	
	public function sponsorSignage() {
		return $this->belongsTo('App\Models\AgreementSignage');
	}
}
