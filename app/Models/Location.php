<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Location extends Model
{
	public $incrementing = false;
	protected $keyType = 'string';
	protected $fillable = [
		'id',
		'zoo_id',
		'location_name',
		'location_type',
		'vacant',
		'surface_area',
		'location_description',
	];

	public function zoo() {
		return $this->belongsTo('App\Models\Zoo');
	}
	
	public function animals() {
		return $this->hasMany('App\Models\Animal');
	}
}
