<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_venta extends Model
{
    //
    protected $table="tipo_ventas";
    protected $primaryKey="id";
    protected $fillable=array('tipo');

    protected $hidden=['created_at','updated_at'];

    public function facturas(){
    	return $this->hasMany('App\factura'); 
    }
}
