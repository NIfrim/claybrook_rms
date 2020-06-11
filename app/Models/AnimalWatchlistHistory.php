<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalWatchlistHistory extends Model
{
	protected $fillable = [
		'animal_id',
		'start',
		'end',
		'reason',
		'created_at',
		'updated_at',
	];
	
	public function animal() {
		return $this->belongsTo(Animal::class);
	}
}
