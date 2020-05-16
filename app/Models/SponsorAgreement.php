<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorAgreement extends Model
{
	public function sponsor() {
		return $this->belongsTo('App\Models\Sponsor');
	}
	
	public function agreementDocuments() {
		return $this->hasMany('App\Models\AgreementDocument');
	}
}
