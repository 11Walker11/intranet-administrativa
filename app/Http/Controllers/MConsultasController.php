<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MConsultasController extends Controller
{
    public function consulta(){

        return view ('mconsultas.consultas');
    }
}
