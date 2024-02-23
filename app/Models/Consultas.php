<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;
    protected $fillable = ['idpa','fecha','apellidom','idusu','costo'.'ruta'];
    protected $date=['deleted_at'];
}
