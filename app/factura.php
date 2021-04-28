<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    //
    protected $table="facturas";
    protected $primaryKey="id";
    protected $fillable=array('clientecredito_id','tipo_venta_id','vendedor_id','fecha','nombre_clientecontado','estado','sub_total','iva','total_factura');

    protected $hidden=['created_at','updated_at'];
    
    public function clientes_creditos(){
    	return $this->belongsTo('App\cliente_credito');
    }

    public function tipo_ventas(){
    	return $this->belongsTo('App\tipo_venta');
    }
    public function vendedores(){
    	return $this->belongsTo('App\vendedor');
    }


    public function detalle_ventas(){
    	return $this->hasMany('App\detalle_venta'); 
    }

}
