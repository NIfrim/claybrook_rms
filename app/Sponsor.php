<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $casts = [
    	'address' => 'array'
	];
    
    public function reviews() {
    	return $this->hasMany('App\Review');
	}
	
	public function paymentDetails() {
		return $this->hasMany('App\PaymentDetails');
	}
	
	public function sponsorAgreements() {
		return $this->hasMany('App\SponsorAgreement');
	}
}
