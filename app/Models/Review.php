<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
		'zoo_id',
		'sponsor_id',
		'user_id',
		'posted_by',
		'title',
		'review',
		'reaction',
		'posted'
	];
	
	public function user() {
		return $this->belongsTo('App\Models\User');
	}
	
	public function sponsor() {
		return $this->belongsTo('App\Models\Sponsor');
	}
	
	public function zoo() {
		return $this->belongsTo('App\Models\Zoo');
	}
}
