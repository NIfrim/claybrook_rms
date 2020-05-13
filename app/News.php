<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $casts = [
    	'images' => 'array'
	];
    
    public function zoo() {
    	return $this->belongsTo('App\Zoo');
	}
	
	public function newsCategory() {
		return $this->belongsTo('App\NewsCategory', 'category_id');
	}
}
