<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
	use Notifiable;
	
	protected $guard = 'admin';
	
	protected $casts = [
		'permissions' => 'array'
	];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'job_title', 'email', 'password'
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
	
	public function accountType() {
		return $this->belongsTo('App\Models\AccountType');
	}
}
