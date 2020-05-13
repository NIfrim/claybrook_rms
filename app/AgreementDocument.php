<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementDocument extends Model
{
    protected $casts = [
    	'meta' => 'array'
	];
}
