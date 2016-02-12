<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
			'name'     => 'Roger Rojas',
			'email'    => 'rrojas@vertice.pe',
			'password' => bcrypt('neovertice')
        ]);

        factory(App\User::class)->create([
			'name'     => 'Esnider Contreras',
			'email'    => 'esnider@vertice.pe',
			'password' => bcrypt('esnider')
        ]);
    }
}
