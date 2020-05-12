<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $casts = [
    	'address' => 'array'
	];
}
