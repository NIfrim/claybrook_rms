<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementSignage extends Model
{
    public function animals() {
    	return $this->hasMany('App\Animal');
	}
	
	public function sponsorAgreement() {
    	return $this->belongsTo('App\SponsorAgreement', 'agreement_id');
	}
}
