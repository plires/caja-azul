<?php

use Illuminate\Database\Seeder;
use App\FishBox;

class FishBoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	FishBox::create([
        'name'        => 'Small Box',
        'description'   => 'Caja Pequeña',
        'price'       => '2500',
        'pieces'       => 2
      ]);
      FishBox::create([
        'name'        => 'Medium Box',
        'description'   => 'Caja Mediana',
        'price'       => '3800',
        'pieces'       => 4
      ]);
      FishBox::create([
        'name'        => 'Large Box',
        'description'   => 'Caja Grande',
        'price'       => '4250',
        'pieces'       => 6
      ]);
    }
}