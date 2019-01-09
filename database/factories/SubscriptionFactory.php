<?php

use Faker\Generator as Faker;
use App\Subscription;
use Carbon\Carbon;

$factory->define(Subscription::class, function (Faker $faker) {

	$date = Carbon::now();

    return [
    	'order_date'				=> Carbon::now(),
			'delivery_day'			=> $faker->randomElement($array = array ('Martes','Jueves')),
			'frecuency'         => $faker->randomElement($array = array ('Semanal','Quincenal','Mensual')),
			'status_id'					=> $faker->numberBetween(1, 3),
			'total'							=> $faker->numberBetween(2500, 4250),
			'user_id'						=> $faker->numberBetween(1, 100),
			'fish_box_id'				=> $faker->numberBetween(1, 3)
    ];
});
