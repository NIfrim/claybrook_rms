<?php

namespace App\Models;

use App\Models\Zoo;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [
    	'zoo_id',
		'name',
		'type',
		'for',
		'ride_intensity',
		'minimum_height',
		'short_description',
		'long_description',
	];
    
    public function zoo() {
    	return $this->belongsTo(Zoo::class);
	}
}
