<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementSignage extends Model
{
	public function animal() {
		return $this->hasMany('App\AgreementSignage');
	}
	
	public function agreement() {
		return $this->belongsTo('App\SponsorAgreement', 'agreement_id');
	}
}
