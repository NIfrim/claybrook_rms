<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static where(string $string, $email)
 */
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
		'zoo_id', 'title', 'first_name', 'last_name', 'job_title', 'email', 'password', 'primary_contact_number', 'secondary_contact_number', 'building', 'road', 'city', 'postcode', 'active'
	];
 
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token'
	];
 
	public function zoo() {
		return $this->belongsTo('App\Models\Zoo');
	}
	
    public function reviews() {
    	return $this->hasMany('App\Models\Review');
	}
	
	public function paymentDetails() {
		return $this->hasMany('App\Models\PaymentDetails');
	}
	
	public function sponsorAgreements() {
		return $this->hasMany('App\Models\SponsorAgreement');
	}
}
