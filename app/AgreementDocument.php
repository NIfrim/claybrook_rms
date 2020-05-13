<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementDocument extends Model
{

    protected $casts = [
    	'meta' => 'array'
	];
    
    public function sponsorAgreement() {
    	return $this->belongsTo('App\SponsorAgreement', 'sponsor_agreement_id');
	}
}
