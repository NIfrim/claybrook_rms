<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
	use Notifiable;
	
	protected $guard = 'admin';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'zoo_id',
		'account_type_id',
		'title',
		'first_name',
		'last_name',
		'job_title',
		'email',
		'password',
		'remember_token',
		'created_at',
		'updated_at',
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
		return $this->belongsTo(Zoo::class);
	}
	
	public function accountType() {
		return $this->belongsTo(AccountType::class);
	}
}
