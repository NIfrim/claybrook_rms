<?php

namespace App\Models;

class Fish extends Animal
{
	protected $fillable = [
		'id',
		'location_id',
		'sponsorship_band_id',
		'species',
		'classification',
		'type',
		'name',
		'date_joined',
		'dob',
		'gender',
		'height_joined',
		'weight_joined',
		'average_body_temperature',
		'water_type',
		'colour',
		'diet',
		'created_at',
		'updated_at'
	];
}
