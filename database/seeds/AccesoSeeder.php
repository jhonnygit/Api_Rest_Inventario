<?php

use Illuminate\Database\Seeder;
use App\acceso;
use Faker\Factory as Faker;
class AccesoSeeder extends Seeder
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
        	acceso::create(
        		[
        			'usuario'=>$faker->name(),
        			'password'=>$faker->word()        			
        			
        		]
        	);
        }
    }
}
