<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acceso extends Model
{
    //
    protected $table="accesos";
    protected $primaryKey="id";
    protected $fillable=array('usuario','password');


}
