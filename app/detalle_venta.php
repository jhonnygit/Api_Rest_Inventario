<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    //
    protected $table="detalle_ventas";
    protected $primaryKey="id";
    protected $fillable=array('factura_id','producto_id','precio_unit','cantidad','descuento','total_venta');

    public function facturas(){
    	$this->belongsTo('factura');
    }

    public function productos(){
    	$this->belongsTo('producto');
    }
}
