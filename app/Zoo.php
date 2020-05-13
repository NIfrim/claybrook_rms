<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zoo extends Model
{
    protected $casts = [
		'address' => 'array',
		'maps' => 'array',
		'contact_details' => 'array'
	];
    
    public function users() {
    	return $this->hasMany('App\User');
	}
	
	public function sponsors() {
		return $this->hasMany('App\Sponsor');
	}
	
	public function employees() {
		return $this->hasMany('App\Employee');
	}
	
	public function locations() {
		return $this->hasMany('App\Location');
	}
	
	public function reviews() {
		return $this->hasMany('App\Review');
	}
	
	public function events() {
		return $this->hasMany('App\Event');
	}
	
	public function news() {
		return $this->hasMany('App\News');
	}
}
