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
}
