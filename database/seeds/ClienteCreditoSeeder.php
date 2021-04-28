<?php

use Illuminate\Database\Seeder;

use App\cliente_credito;
use Faker\Factory as Faker;

class ClienteCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        for($i=0;$i<3;$i++){
        	cliente_credito::create(
        		[
        			'nombre'=>$faker->name(),
        			'apellidos'=>$faker->firstName(),
        			'direccion'=>$faker->address(),
        			'telefono'=>$faker->PhoneNumber(),
        			'celular'=>$faker->PhoneNumber()
        		]
        	);
        }
    }
}
