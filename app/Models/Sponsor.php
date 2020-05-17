<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sponsor extends Authenticatable
{
	use Notifiable;
	
	protected $guard = 'sponsor';
	
    protected $casts = [
    	'address' => 'array'
	];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'zoo_id', 'title', 'first_name', 'last_name', 'job_title', 'email', 'password', 'primary_contact_number', 'secondary_contact_number', 'address', 'created_at', 'updated_at', 'active', 'registered'
	];
 
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token'
	];
    
    public function reviews() {
    	return $this->hasMany('App\Models\Review');
	}
	
	public function paymentDetails() {
		return $this->hasMany('App\Models\PaymentDetails');
	}
	
	public function sponsorAgreements() {
		return $this->hasMany('App\SponsorAgreement');
	}
}
