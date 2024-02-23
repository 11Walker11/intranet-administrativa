@extends('layouts.plantillabase')

@section('contenido')
<form action="/pacientes" method="POST">
{{csrf_field()}}
  <fieldset>
    <legend>Alta Pacientes</legend>
    
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
      @if($errors->first('nombrep'))
        <p class="text-warning"> {{$errors->first('nombrep')}} </p>
      @endif
      <input type="text" name = "nombrep" value= "{{old('nombrep')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el nombre del Paciente">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido Paterno</label>
      @if($errors->first('apellidop'))
        <p class="text-warning"> {{$errors->first('apellidop')}} </p>
      @endif
      <input type="text" name = "apellidop" value= "{{old('apellidop')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el apellido paterno">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido Materno</label>
      @if($errors->first('apellidom'))
        <p class="text-warning"> {{$errors->first('apellidom')}} </p>
      @endif
      <input type="text" name = "apellidom" value= "{{old('apellidop')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el apellido materno">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Edad</label>
      @if($errors->first('edad'))
        <p class="text-warning"> {{$errors->first('edad')}} </p>
      @endif
      <input type="text" name = "edad" value= "{{old('edad')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe la edad del paciente">
    </div>


    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Estado</label>
      <select class="form-select" name="estado">
        <option value="1">Puebla</option>
        <option value="2">Estado de Mexico</option>
        <option value="3">Colima</option>
        <option value="4">Veracruz</option>
        <option value="5">Baja California</option>
        <option value="6">Oaxaca</option>
        <option value="7">Tamaulipas</option>
        <option value="8">Campeche</option>
        <option value="9">Monterrey</option>
        <option value="10">Sinaloa</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Correo</label>
      @if($errors->first('correo'))
        <p class="text-warning"> {{$errors->first('correo')}} </p>
      @endif
      <input type="email" name = "correo" value= "{{old('correo')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el correo electronico: usuario@gmail.com">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Telefono</label>
      @if($errors->first('telefono'))
        <p class="text-warning"> {{$errors->first('telefono')}} </p>
      @endif
      <input type="text" name = "telefono" value= "{{old('telefono')}}" class="form-control" aria-describedby="emailHelp" placeholder="Digita el numero de telefono">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Calle</label>
      @if($errors->first('calle'))
        <p class="text-warning"> {{$errors->first('calle')}} </p>
      @endif
      <input type="text" name = "calle" value= "{{old('calle')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el nombre de la calle">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Colonia</label>
      @if($errors->first('colonia'))
        <p class="text-warning"> {{$errors->first('colonia')}} </p>
      @endif
      <input type="text" name = "colonia" value= "{{old('colonia')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el nombre de la colonia">
    </div>

    <fieldset class="form-group">
      <legend class="mt-4">Activo</legend>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="activo" value="si" checked="">
        <label class="form-check-label" for="optionsRadios1">
          Si
        </label>
      </div>

      <br>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="activo" value="no">
        <label class="form-check-label" for="optionsRadios2">
        No
        </label>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Numero de Expediente</label>
      @if($errors->first('noexp'))
        <p class="text-warning"> {{$errors->first('noexp')}} </p>
      @endif
      <input type="text" name = "noexp" value= "{{old('noexp')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el numero de expediente del paciente">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1" class="form-label mt-4">Foto</label>
    @if($errors->first('foto'))
      <p class="text-warning"> {{$errors->first('foto')}} </p>
    @endif
    <input type="file" name = "foto" value= "{{old('foto')}}" class="form-control"  placeholder="Selecciona una foto">
    </div>
    <div>
    </fieldset>
    <div>
         <br>
         <a href="/pacientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
         <button type="submit" class="btn btn-primary" >Guardar Paciente</button>
         </br>
       </div>
       </fieldset>
@endsection
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario</h1>
@stop

@section('content')
    <form action="/pacientes" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset>
    <legend>Alta Pacientes</legend>
    
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
      @if($errors->first('nombrep'))
        <p class="text-warning"> {{$errors->first('nombrep')}} </p>
      @endif
      <input type="text" name = "nombrep" value= "{{old('nombrep')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el nombre del Paciente">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido Paterno</label>
      @if($errors->first('apellidop'))
        <p class="text-warning"> {{$errors->first('apellidop')}} </p>
      @endif
      <input type="text" name = "apellidop" value= "{{old('apellidop')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el apellido paterno">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido Materno</label>
      @if($errors->first('apellidom'))
        <p class="text-warning"> {{$errors->first('apellidom')}} </p>
      @endif
      <input type="text" name = "apellidom" value= "{{old('apellidop')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el apellido materno">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Edad</label>
      @if($errors->first('edad'))
        <p class="text-warning"> {{$errors->first('edad')}} </p>
      @endif
      <input type="text" name = "edad" value= "{{old('edad')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe la edad del paciente">
    </div>


    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Estado</label>
      <select class="form-select" name="estado">
        <option value="1">Puebla</option>
        <option value="2">Estado de Mexico</option>
        <option value="3">Colima</option>
        <option value="4">Veracruz</option>
        <option value="5">Baja California</option>
        <option value="6">Oaxaca</option>
        <option value="7">Tamaulipas</option>
        <option value="8">Campeche</option>
        <option value="9">Monterrey</option>
        <option value="10">Sinaloa</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Correo</label>
      @if($errors->first('correo'))
        <p class="text-warning"> {{$errors->first('correo')}} </p>
      @endif
      <input type="email" name = "correo" value= "{{old('correo')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el correo electronico: usuario@gmail.com">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Telefono</label>
      @if($errors->first('telefono'))
        <p class="text-warning"> {{$errors->first('telefono')}} </p>
      @endif
      <input type="text" name = "telefono" value= "{{old('telefono')}}" class="form-control" aria-describedby="emailHelp" placeholder="Digita el numero de telefono">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Calle</label>
      @if($errors->first('calle'))
        <p class="text-warning"> {{$errors->first('calle')}} </p>
      @endif
      <input type="text" name = "calle" value= "{{old('calle')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el nombre de la calle">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Colonia</label>
      @if($errors->first('colonia'))
        <p class="text-warning"> {{$errors->first('colonia')}} </p>
      @endif
      <input type="text" name = "colonia" value= "{{old('colonia')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el nombre de la colonia">
    </div>

    <fieldset class="form-group">
      <legend class="mt-4">Activo</legend>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="activo" value="si" checked="">
        <label class="form-check-label" for="optionsRadios1">
          Si
        </label>
      </div>

      <br>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="activo" value="no">
        <label class="form-check-label" for="optionsRadios2">
        No
        </label>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Numero de Expediente</label>
      @if($errors->first('noexp'))
        <p class="text-warning"> {{$errors->first('noexp')}} </p>
      @endif
      <input type="text" name = "noexp" value= "{{old('noexp')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el numero de expediente del paciente">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1" class="form-label mt-4">Foto</label>
    @if($errors->first('foto'))
      <p class="text-warning"> {{$errors->first('foto')}} </p>
    @endif
    <input type="file" name = "foto" value= "{{old('foto')}}" class="form-control"  placeholder="Selecciona una foto">
    </div>
    <div>
    </fieldset>

          <a href="/pacientes" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary" >Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop