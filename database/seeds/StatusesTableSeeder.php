<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Status::create([
        'name'        	=> 'Pendiente',
        'description'   => 'Suscripcion Pendiente de Pago'
      ]);
      Status::create([
        'name'        	=> 'Activa',
        'description'   => 'Suscripcion Activa'
      ]);
      Status::create([
        'name'        	=> 'Cancelada',
        'description'   => 'Suscripcion Cancelada'
      ]);
    }
}
