<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorAgreement extends Model
{
	public function sponsor() {
		return $this->belongsTo('App\Sponsor');
	}
	
	public function agreementDocuments() {
		return $this->hasMany('App\AgreementDocument');
	}
}
