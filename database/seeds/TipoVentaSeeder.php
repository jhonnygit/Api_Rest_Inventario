<?php

use Illuminate\Database\Seeder;

use App\tipo_venta;
use Faker\Factory as Faker;

class TipoVentaSeeder extends Seeder
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
        	tipo_venta::create(
        		[
        			'tipo'=>$faker->word()
        		]
        	);
        }
        

    }
}
