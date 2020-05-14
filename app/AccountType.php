<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
	public $incrementing = false;
	protected $keyType = 'string';
	
	protected $casts = [
		'permissions' => 'array'
	];
	
    public function employees() {
    	return $this->hasMany('App\Employee');
	}
}
