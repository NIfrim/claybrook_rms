<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	public function zoo() {
		return $this->belongsTo('App\Zoo');
	}
	
	public function employeeAccounts() {
		return $this->hasMany('App\EmployeeAccount');
	}
}
