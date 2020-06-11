<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
    	'zoo_id',
    	'type',
		'price_online',
		'price_gate',
	];
    
    public function zoo() {
    	return $this->belongsTo(Zoo::class);
	}
}
