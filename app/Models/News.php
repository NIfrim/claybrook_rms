<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $fillable = [
		'zoo_id',
		'category_id',
		'title',
		'date_posted',
		'date_expire',
		'repeat',
		'short_description',
		'long_description',
		'image',
	];
    
    public function zoo() {
    	return $this->belongsTo('App\Models\Zoo');
	}
	
	public function newsCategory() {
		return $this->belongsTo('App\Models\NewsCategory', 'category_id');
	}
}
