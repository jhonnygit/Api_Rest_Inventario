<?php

use Illuminate\Database\Seeder;
use App\categoria;
use Faker\Factory as Faker;
class CategoriaSeeder extends Seeder
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
        	Categoria::create(
        		[
        			'categoria'=>$faker->word(),
        			'estado'=>$faker->randomElement(['1','0'])
        		]
        	); 
        }
    }
}
