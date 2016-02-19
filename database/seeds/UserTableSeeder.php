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
        //Vertice
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

        //Festival
        factory(App\User::class)->create([
            'name'     => 'Leslie Rojas',
            'email'    => 'krojas@pucp.pe',
            'password' => bcrypt('7%di5G/F/Bz1')
        ]);

        factory(App\User::class)->create([
            'name'     => 'Alicia Morales',
            'email'    => 'lmorale@pucp.pe',
            'password' => bcrypt('+IX*xvb]yqQS')
        ]);

        factory(App\User::class)->create([
            'name'     => 'Prensa CCPUCP',
            'email'    => 'prensacc@pucp.pe',
            'password' => bcrypt('C@x(72:OC}:a')
        ]);

        factory(App\User::class)->create([
            'name'     => 'Gabriela Zenteno',
            'email'    => 'gzenteno@pucp.pe',
            'password' => bcrypt('8v2ORn0u"fys')
        ]);
    }
}
