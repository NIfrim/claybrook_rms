<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
	public function sponsor() {
		return $this->belongsTo('App\Models\Sponsor');
	}
}
