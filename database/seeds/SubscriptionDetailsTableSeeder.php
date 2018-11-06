<?php

use Illuminate\Database\Seeder;
use App\SubscriptionDetail;

class SubscriptionDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(SubscriptionDetail::class, 50)->create();
    }
}