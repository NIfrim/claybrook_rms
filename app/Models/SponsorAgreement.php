<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorAgreement extends Model
{
	protected $casts = [
		'documents' => 'array'
	];
	
	protected $fillable = [
		'sponsor_id',
		'date',
		'agreement_start',
		'agreement_end',
		'signage_area',
		'payment_status',
		'documents'
	];
	
	public function sponsor() {
		return $this->belongsTo('App\Models\Sponsor');
	}
}
