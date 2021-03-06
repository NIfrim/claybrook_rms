<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;
	
	protected $guard = 'user';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'zoo_id', 'title', 'first_name', 'last_name', 'email', 'password', 'created_at', 'updated_at', 'active', 'registered'
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
}
