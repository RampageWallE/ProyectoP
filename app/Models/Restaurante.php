<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Restaurante extends Model
{
    use HasFactory;
    protected $connection='mongodb';
    protected $collection='restaurantes';

    public function reservas()
    {
        return $this->hasMany(Reserva::class, '_id');
    }

    // public function scopeRestaurantes($query){
    //     // return $query->where('role','cliente');
    //     return $query->all();
}

