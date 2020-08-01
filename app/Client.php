<?php

namespace App;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model {
	
	use Filterable, SoftDeletes;
	
	protected $casts = [
		'emails' => 'array',
		'phones' => 'array'
	];
	protected $fillable = [
		'name', 'surname', 'emails', 'phones'
	];
	protected $hidden = [];
}
