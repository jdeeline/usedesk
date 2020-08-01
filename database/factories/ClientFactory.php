<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
	
	$emails = [];
	foreach (range(1, rand(2, 10)) as $index) {
		$emails[] = $faker->email;
	}
	
	$phones = [];
	foreach (range(1, rand(2, 10)) as $index) {
		$phones[] = $faker->tollFreePhoneNumber;
	}
	
    return [
        'name' => $faker->firstName,
		'surname' => $faker->lastName,
		'emails' => $emails,
		'phones' => $phones
    ];
});
