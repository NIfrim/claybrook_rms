<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    protected $casts = [
    	'permissions' => 'array'
	];
    
    protected $fillable = [
    	'employee_id', 'account_type', 'username', 'password', 'permissions', 'active'
	];
	
	protected $hidden = [
		'password', 'remember_token'
	];
	
	public function getAuthPassword() {
		return $this->password;
	}
	
	public function employee() {
		return $this->belongsTo('App\Employee');
	}
}
