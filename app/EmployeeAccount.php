<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    protected $casts = [
    	'permissions' => 'array'
	];
}
