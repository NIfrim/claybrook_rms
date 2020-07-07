<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * @method static create(array $array)
 */
class Animal extends Model
{
	use HasRelationships;
	
	protected $casts = [
		'images' => 'array',
	];
	
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
		'height_current',
		'weight_joined',
		'weight_current',
		'nest_construction',
		'clutch_size',
		'wingspan',
		'can_fly',
		'plumage',
		'on_website',
		'in_spotlight',
		'gestational_period',
		'offspring_number',
		'life_span',
		'average_body_temperature',
		'water_type',
		'colour',
		'reproduction_type',
		'diet',
		'did_you_know',
		'images',
		'created_at',
		'updated_at'
	];

	public function medicalHistory() {
		return $this->hasMany(AnimalMedicalHistory::class);
	}
	
	public function location() {
		return $this->belongsTo(Location::class);
	}
	
	public function educationalInfo() {
		return $this->belongsTo(EducationalInfo::class);
	}
	
	public function animalHabitat() {
		return $this->belongsTo(AnimalHabitat::class);
	}
	
	public function sponsorshipBand() {
		return $this->belongsTo(SponsorshipBand::class);
	}
	
	public function sponsorSignage() {
		return $this->belongsTo(AgreementSignage::class);
	}
	
	public function sponsor() {
		return $this->hasOneDeep(
			Sponsor::class,
			[AgreementSignage::class, SponsorAgreement::class],
			['id', 'id', 'id'],
			['agreement_signage_id', 'agreement_id', 'sponsor_id']
		);
	}
}
