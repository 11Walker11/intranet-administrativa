@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>TRATAMIENTOS</h1>
@stop

@section('content')
<html>
    <head>
            <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
    </head>
    <body>
      <script type="text/javascript">
        $(document).ready(function(){

     });
      </script>
      <form>
            No. Tratamiento<input type='text' id= '' name='' value = '' readonly>
            <br>
            Fecha <input type='date' id= '' name=''>
            <br>
            </select>
            Especialistas<select name = '' id= ''>
                 <option value= ''></option>
            </select>
            <br>
            </select>
            Tipo Tratamiento<select name = '' id= ''>
                 <option value= ''></option>
            </select>
            <br>
            Costo<input type='text' name = '' id= '' >
            <br>
            Honorarios Especialista<input type='text' name = '' id= '' >
            <br>
            Total<input type='text' name = '' id= '' >
            <br>
            Descuento:
            <input type='radio' id='' name ='' value = 'Si'>Si
            <input type='radio' id='' name ='' value = 'No'>No
            <br>
            Total Final<input type='text' name = '' id= '' >
            <br>
            
            <input type = 'button' value ='agregar' id='agregar'>
      </form>
        
    </body>
    </html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
