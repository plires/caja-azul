<?php

use Faker\Generator as Faker;
use App\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
    	'street'				=>	$faker->streetName,
			'number'				=>	$faker->buildingNumber,
			'departament'		=>	$faker->city,
			'floor'					=>	$faker->city,
			'locality'			=>	$faker->state,
			'cp'						=>	$faker->postcode,
			'state'					=>	$faker->state,
			'country'				=>	$faker->country
    ];
});
