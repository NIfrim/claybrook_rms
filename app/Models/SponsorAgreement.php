<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorAgreement extends Model
{
	protected $casts = [
		'documents' => 'array'
	];
	
	public function sponsor() {
		return $this->belongsTo('App\Models\Sponsor');
	}
}
