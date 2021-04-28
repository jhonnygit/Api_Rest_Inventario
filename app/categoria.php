<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    //
    protected $table="categorias";
    protected $primaryKey="id";
    protected $fillable=array('categoria','estado');

    protected $hidden=['created_at','updated_at'];


    public function productos(){
    	return $this->hasMany('App\producto'); 
    }
}
