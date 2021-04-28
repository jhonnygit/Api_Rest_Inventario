<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call('AccesoSeeder');
        $this->call('ClienteCreditoSeeder');
        $this->call('CategoriaSeeder');
        $this->call('VendedorSeeder');
        $this->call('TipoVentaSeeder');
        $this->call('ProductoSeeder');
        $this->call('FacturaSeeder');
        $this->call('DetalleVentaSeeder');
       
        User::truncate();
        $this->call('UserSeeder');


    }
}
