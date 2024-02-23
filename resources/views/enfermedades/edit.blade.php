@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
    <form action="/enfermedades/{{$enfermedades->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$enfermedades->nombre}}" >
          </div>

        </fieldset>
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Foto:</label>
          <br>
          @if($errors->first('foto'))
          <p class="text-warning">{{$errors->first('foto')}}</p>
          @endif
          <img src = "{{asset('archivos/'.$enfermedades->ruta)}}" height=150 width=150>
          <input type="file" name="foto" class="form-control" placeholder="Selecciona foto jpg,png,etc">
        </div>
    </fieldset>

          <a href="/enfermedades" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary" >Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
