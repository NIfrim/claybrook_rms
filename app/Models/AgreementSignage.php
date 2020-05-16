<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgreementSignage extends Model
{
    public function animals() {
    	return $this->hasMany('App\Models\Animal');
	}
	
	public function sponsorAgreement() {
    	return $this->belongsTo('App\Models\SponsorAgreement', 'agreement_id');
	}
}
