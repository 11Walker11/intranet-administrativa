<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $fillable = ['idusu','nombre','apellidop','apellidom','telefono','correo','idrol'.'ruta'];
    protected $date=['deleted_at'];
}
