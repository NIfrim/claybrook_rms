<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
	public $incrementing = false;
	protected $keyType = 'string';
	
	protected $fillable = [
		'name',
		'created_at',
		'updated_at',
		'permissions',
	];
	
	protected $casts = [
		'permissions' => 'array'
	];
	
    public function employees() {
    	return $this->hasMany('App\Models\Employee');
	}
}
