<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgreementSignage extends Model
{
	protected $casts = [
		'images' => 'array'
	];
	
	protected $fillable = [
		'animal_id',
		'agreement_id',
		'status',
		'reason',
		'images',
	];
	
    public function animals() {
    	return $this->hasMany('App\Models\Animal');
	}
	
	public function sponsorAgreement() {
    	return $this->belongsTo('App\Models\SponsorAgreement', 'agreement_id');
	}
}
