<?php

namespace App\Models;

class Bird extends Animal
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
		'nest_construction',
		'clutch_size',
		'wingspan',
		'can_fly',
		'plumage',
		'diet',
		'created_at',
		'updated_at'
	];
}
