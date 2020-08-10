<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
		'middleware' => [ 'auth:api', 'api_log' ]
	], function () {
	Route::apiResource('/clients', 'Api\ClientController');
});