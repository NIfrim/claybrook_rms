<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalMedicalHistory extends Model
{
    protected $fillable = [
    	'animal_id',
    	'datetime',
		'incident',
		'treatment',
		'created_at',
		'updated_at',
	];
    
    public function animal() {
    	return $this->belongsTo(Animal::class);
	}
}
