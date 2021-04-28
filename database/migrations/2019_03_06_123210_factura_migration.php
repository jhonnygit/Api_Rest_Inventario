<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FacturaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_credito_id')->unsigned();
            $table->integer('tipo_venta_id')->unsigned();
            $table->integer('vendedor_id')->unsigned();
            $table->datetime('fecha');
            $table->string('nombre_clientecontado');
            $table->string('estado');
            $table->float('sub_total');
            $table->float('iva');
            $table->float('total_factura');
            $table->foreign('cliente_credito_id')->references('id')->on('clientes_creditos');
            $table->foreign('tipo_venta_id')->references('id')->on('tipo_ventas');
            $table->foreign('vendedor_id')->references('id')->on('vendedors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
