<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
    //
    protected $table="vendedors";
    protected $primaryKey="id";
    protected $fillable=array('nombre','apellidos');

    public function facturas(){
    	return $this->hasMany('App\factura'); 
    }
}
