<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Reserva extends Model
{
    use HasFactory;
    protected $connection='mongodb';
    protected $collection='reservas';

    public function restaurantes(){
        return $this->belongsTo(Restaurante::class, 'id_restaurante');
    }

    public function usuarios(){
        return $this->belongsTo(User::class,'id_cliente');
    }
}
