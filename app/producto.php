<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //
    protected $table="productos";
    protected $primaryKey="id";
    protected $fillable=array('categoria_id','producto','modelo','caracteristicas','existencia','precio_compra',
    	'precio_venta','estado');

    protected $hidden=['created_at','updated_at'];

    public function categorias(){
    	return $this->belongsTo('App\categoria');
    }

    public function detalle_ventas(){
    	return $this->hasOne('App\detalle_venta');
    }
}
