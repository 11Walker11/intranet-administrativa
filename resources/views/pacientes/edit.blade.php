@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
    <form action="/pacientes/{{$pacientes->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
      @if($errors->first('nombrep'))
        <p class="text-warning"> {{$errors->first('nombrep')}} </p>
      @endif
      <input type="text" name = "nombrep" value= "{{$pacientes->nombrep}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido Paterno</label>
      @if($errors->first('apellidop'))
        <p class="text-warning"> {{$errors->first('apellidop')}} </p>
      @endif
      <input type="text" name = "apellidop" value= "{{$pacientes->apellidop}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido Materno</label>
      @if($errors->first('apellidom'))
        <p class="text-warning"> {{$errors->first('apellidom')}} </p>
      @endif
      <input type="text" name = "apellidom" value= "{{$pacientes->apellidom}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Edad</label>
      @if($errors->first('edad'))
        <p class="text-warning"> {{$errors->first('edad')}} </p>
      @endif
      <input type="text" name = "edad" value= "{{$pacientes->edad}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Estado</label>
      @if($errors->first('estado'))
        <p class="text-warning"> {{$errors->first('estado')}} </p>
      @endif
      <input type="text" name = "estado" value= "{{$pacientes->estado}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Correo</label>
      @if($errors->first('correo'))
        <p class="text-warning"> {{$errors->first('correo')}} </p>
      @endif
      <input type="email" name = "correo" value= "{{$pacientes->correo}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Telefono</label>
      @if($errors->first('telefono'))
        <p class="text-warning"> {{$errors->first('telefono')}} </p>
      @endif
      <input type="text" name = "telefono" value= "{{$pacientes->telefono}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Calle</label>
      @if($errors->first('calle'))
        <p class="text-warning"> {{$errors->first('calle')}} </p>
      @endif
      <input type="text" name = "calle" value= "{{$pacientes->calle}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Colonia</label>
      @if($errors->first('colonia'))
        <p class="text-warning"> {{$errors->first('colonia')}} </p>
      @endif
      <input type="text" name = "colonia" value= "{{$pacientes->colonia}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <fieldset class="form-group">
      <legend class="mt-4">Activo</legend>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="activo" value="si" @if($pacientes->activo =='si') checked @endif>
        <label class="form-check-label" for="optionsRadios1">
        Si
        </label>
      </div>

      <br>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="activo" value="no" @if($pacientes->activo =='no') checked @endif>
        <label class="form-check-label" for="optionsRadios2">
        No
        </label>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Numero de Expediente</label>
      @if($errors->first('noexp'))
        <p class="text-warning"> {{$errors->first('noexp')}} </p>
      @endif
      <input type="text" name = "noexp" value= "{{$pacientes->noexp}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>
        </fieldset>
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Foto:</label>
          <br>
          @if($errors->first('foto'))
          <p class="text-warning">{{$errors->first('foto')}}</p>
          @endif
          <img src = "{{asset('archivos/'.$pacientes->ruta)}}" height=150 width=150>
          <input type="file" name="foto" class="form-control" placeholder="Selecciona foto jpg,png,etc">
        </div>
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
