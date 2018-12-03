<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			Role::create([
				'name'        => 'Usuario',
				'description'   => 'Usuario Standar'
			]);

			Role::create([
				'name'        => 'Administrador',
				'description'   => 'Usuario on todos los permisos'
			]);

    }
}