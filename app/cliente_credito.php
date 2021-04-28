<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente_credito extends Model
{
    //
    protected $table="clientes_creditos";
    protected $primaryKey="id";
    protected $fillable=array('nombre','apellidos','direccion','telefono','celular');

    protected $hidden=['created_at','updated_at'];

    public function facturas(){
    	return $this->hasMany('App\factura'); //aqui se indica el modelo
    }
}
