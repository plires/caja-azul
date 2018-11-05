<?php

use Illuminate\Database\Seeder;
use App\DiscountCode;

class DiscountCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(DiscountCode::class, 10)->create();
    }
}
