<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datosalud extends Model
{
    use HasFactory;
    protected $fillable = ['idds','idpa','peso','estatura','imc','edad','sexo','idenf'];
    protected $date=['deleted_at'];

}
