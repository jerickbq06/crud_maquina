<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_vehiculo',
        'categoria',
        'descripcion', 
        'fecha_creacion',
        'fecha_caducidad',
    ];
}

