<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoo extends Model
{
    protected $casts = [
		'address' => 'array',
		'maps' => 'array',
		'contact_details' => 'array',
		'opening_times' => 'array',
		'images' => 'array',
	];
    
    protected $fillable = [
    	'company_number',
		'name',
		'address',
		'contact_details',
		'maps',
		'opening_times',
		'images',
		'history',
	];
    
    public function users() {
    	return $this->hasMany('App\Models\User');
	}
	
	public function sponsors() {
		return $this->hasMany('App\Models\Sponsor');
	}
	
	public function employees() {
		return $this->hasMany('App\Models\Employee');
	}
	
	public function locations() {
		return $this->hasMany('App\Models\Location');
	}
	
	public function reviews() {
		return $this->hasMany('App\Models\Review');
	}
	
	public function events() {
		return $this->hasMany('App\Models\Event');
	}
	
	public function news() {
		return $this->hasMany('App\Models\News');
	}
}
