<?php

use Illuminate\Database\Seeder;
use App\Images;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Images::class, 20)->create();
    }
}
