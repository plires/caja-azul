<?php

use Illuminate\Database\Seeder;
use App\Subscription;
use Carbon\Carbon;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::create([
            'order_date'        => Carbon::now(),
            'arrival_date'      => '2018-12-21',
            'frecuency'         => 'Mensual',
            'status_id'         => \Faker\Factory::create()->numberBetween(1, 3),
            'total'             => \Faker\Factory::create()->numberBetween(2500, 4250),
            'user_id'           => 1,
            'fish_box_id'       => \Faker\Factory::create()->numberBetween(1, 3)
          ]);

          Subscription::create([
            'order_date'        => Carbon::now(),
            'arrival_date'      => '2018-12-21',
            'frecuency'         => 'Quincenal',
            'status_id'         => \Faker\Factory::create()->numberBetween(1, 3),
            'total'             => \Faker\Factory::create()->numberBetween(2500, 4250),
            'user_id'           => 1,
            'fish_box_id'       => \Faker\Factory::create()->numberBetween(1, 3)
          ]);
     
    }
}