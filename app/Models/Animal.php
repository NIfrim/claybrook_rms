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
	protected $fillable = [
		'id',
		'location_id',
		'sponsorship_band_id',
		'species',
		'classification',
		'type',
		'name',
		'date_joined',
		'dob',
		'gender',
		'height_joined',
		'weight_joined',
		'diet',
		'created_at',
		'updated_at'
	]; // Add fillable attributes in extended class
	
	public function location() {
		return $this->belongsTo('App\Models\Location');
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
