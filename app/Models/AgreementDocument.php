<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgreementDocument extends Model
{

    protected $casts = [
    	'meta' => 'array'
	];
    
    public function sponsorAgreement() {
    	return $this->belongsTo('App\Models\SponsorAgreement', 'sponsor_agreement_id');
	}
}
