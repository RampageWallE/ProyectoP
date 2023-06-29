<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class ContratoEmpleado extends Model
{
    use HasFactory;
    protected $collection = 'ContratoEmpleado';

    public function admin(){
        return $this->belongsTo(User::class,'id_administrador');
    }

    public function empleado(){
        return $this->belongsTo(User::class, 'id_empleado');
    }

}
