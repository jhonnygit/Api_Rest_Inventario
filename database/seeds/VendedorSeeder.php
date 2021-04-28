<?php

use Illuminate\Database\Seeder;

use App\vendedor;
use Faker\Factory as Faker;

class VendedorSeeder extends Seeder
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
        	vendedor::create(
        		[
        			'nombre'=>$faker->name(),
        			'apellidos'=>$faker->firstName()
        		]
        	);
        }
    }
}
