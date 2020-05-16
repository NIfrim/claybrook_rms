<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $casts = [
    	'images' => 'array'
	];
    
    public function zoo() {
    	return $this->belongsTo('App\Models\Zoo');
	}
	
	public function newsCategory() {
		return $this->belongsTo('App\Models\NewsCategory', 'category_id');
	}
}
