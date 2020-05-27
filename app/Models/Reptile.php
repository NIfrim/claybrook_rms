<?php

namespace App\Models;

class Reptile extends Animal
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
		'reproduction_type',
		'offspring_number',
		'clutch_size',
		'diet',
		'created_at',
		'updated_at'
	];
}
