<?php

use Illuminate\Database\Seeder;

use App\detalle_venta;
use App\factura;
use App\producto;
use Faker\Factory as Faker;

class DetalleVentaSeeder extends Seeder
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

    	$cantidadFac=factura::all()->count();
    	$cantidadProd=producto::all()->count();
    	
        for($i=0;$i<$cantidadFac;$i++){
        	detalle_venta::create(
        		[
        			'factura_id'=>$faker->numberBetween(1,$cantidadFac),
        			'producto_id'=>$faker->numberBetween(1,$cantidadProd),
        			'precio_unit'=>$faker->randomFloat(2,0,1),
        			'cantidad'=>$faker->randomFloat(2,0,1),
        			'descuento'=>$faker->randomFloat(2,0,1),
        			'total_venta'=>$faker->randomFloat(2,0,1)
        			       			
        		]
        	);
        }
    }
}
