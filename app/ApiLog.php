<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model {
	
	const UPDATED_AT = null;
    
	protected $casts = [
		'request' => 'array'
	];
	protected $fillable = [
		'url',
		'method',
		'request',
		'visitor',
		'user_id'
	];
}
