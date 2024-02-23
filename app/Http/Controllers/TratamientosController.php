<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TratamientosController extends Controller
{
    public function tratamiento(){

        return view ('mtratamientos.tratamientos');
    }
}
