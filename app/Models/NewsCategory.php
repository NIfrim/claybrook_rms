<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
	protected $fillable = [
		'title',
		'short_description',
		'long_description',
		'image'
	];
	
	public function news() {
		return $this->hasMany('App\Models\News', 'category_id');
	}
}
