<?php

use Illuminate\Database\Seeder;

use App\categoria;
use App\producto;
use Faker\Factory as Faker;

class ProductoSeeder extends Seeder
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

    	$cantidad=categoria::all()->count();

        for($i=0;$i<$cantidad;$i++){
        	producto::create(
        		[
        			'categoria_id'=>$faker->numberBetween(1,$cantidad),
        			'producto'=>$faker->word(),
        			'modelo'=>$faker->word(),
        			'caracteristicas'=>$faker->RealText(),
        			'existencia'=>$faker->randomFloat(2,0,1),
        			'precio_compra'=>$faker->randomFloat(2,0,1),
        			'precio_venta'=>$faker->randomFloat(2,0,1),
        			'estado'=>$faker->randomElement(['1','0'])
        		]
        	);
        }
    }
}
