<?php

namespace App\Models;

class Mammal extends Animal
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
		'gestational_period',
		'offspring_number',
		'colour',
		'diet',
		'created_at',
		'updated_at'
	];
}
