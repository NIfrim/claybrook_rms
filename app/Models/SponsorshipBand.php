<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorshipBand extends Model
{
	protected $fillable = [
		'band',
		'price',
		'duration',
	];
	
	public function animals() {
		return $this->hasMany(Animal::class);
	}
}
