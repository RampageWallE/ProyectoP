<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class RegistroRespuesta extends Model
{
    use HasFactory;

    protected $collection='registrorespuesta';

    public function consulta(){
        return $this->belongsTo(Consulta::class,'id_consulta');
    }
}
