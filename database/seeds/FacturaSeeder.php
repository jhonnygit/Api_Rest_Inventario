<?php

use Illuminate\Database\Seeder;

use App\vendedor;
use App\cliente_credito;
use App\tipo_venta;
use App\factura;

use Faker\Factory as Faker;

class FacturaSeeder extends Seeder
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

    	$cantidadVen=vendedor::all()->count();
    	$cantidadClient=cliente_credito::all()->count();
    	$cantidadTipo=tipo_venta::all()->count();

        for($i=0;$i<$cantidadVen;$i++){
        	factura::create(
        		[
        			'cliente_credito_id'=>$faker->numberBetween(1,$cantidadClient),
        			'tipo_venta_id'=>$faker->numberBetween(1,$cantidadTipo),
        			'vendedor_id'=>$faker->numberBetween(1,$cantidadVen),
        			'fecha'=>$faker->Date(),
        			'nombre_clientecontado'=>$faker->name(),
        			'estado'=>$faker->randomElement(['1','0']),
        			'sub_total'=>$faker->randomFloat(2,0,1),
        			'iva'=>$faker->randomFloat(2,0,1),
        			'total_factura'=>$faker->randomFloat(2,0,1)
        		]
        	);
        }
    }
}
