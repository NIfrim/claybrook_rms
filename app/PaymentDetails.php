<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
	public function sponsor() {
		return $this->belongsTo('App\Sponsor');
	}
}
