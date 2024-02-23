@extends('main')

@section('contenido')
    <form action="{{route('guardaConsultas')}}" method="POST" enctype = "multipart/form-data">
    {{csrf_field()}}
  <fieldset>
    <legend>Editar Consulta</legend>

    <input type="hidden" name="id" value="{{$consultas->idco}}">
    
    <div class="mb-3">
            <label for="exampleSelect1" class="form-label mt-4">Paciente</label>
            <select class="form-select"  name='idpa'>
            <option value = "{{$consultas->idpa}}">{{$consultas->paciente}}</option>
              @foreach($pacientes as $p)
              <option value = '{{$p->id}}'>{{$p->nombrep}}</option>
              @endforeach
    </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Fecha</label>
      @if($errors->first('fecha'))
        <p class="text-warning"> {{$errors->first('fecha')}} </p>
      @endif
      <input type="text" name = "fecha" value= "{{$consultas->fecha}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="mb-3">
            <label for="exampleSelect1" class="form-label mt-4">Usuarios</label>
            <select class="form-select" name='idusu'>
            <option value = "{{$consultas->idusu}}">{{$consultas->usuario}}</option>
              @foreach($usuarios as $u)
              <option value = "{{$u->id}}">{{$u->nombre}}</option>
              @endforeach
            </select>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Costo</label>
      @if($errors->first('costo'))
        <p class="text-warning"> {{$errors->first('costo')}} </p>
      @endif
      <input type="text" name = "costo" value= "{{$consultas->costo}}" class="form-control" aria-describedby="emailHelp" placeholder="">
    </div>
    <div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4">Foto</label>
        @if($errors->first('foto'))
          <p class="text-warning"> {{$errors->first('foto')}} </p>
        @endif
        <img src = "{{asset('archivos/'.$consultas->ruta)}}" height="50" width="50">
        <input type="file" name = "foto" value= "{{old('foto')}}" class="form-control" aria-describedby="emailHelp" placeholder="Selecciona foto jpg, png">
    </div>
         <br>
         <button type="submit" class="btn btn-danger">Guardar Consulta</button>
         </br>
    </div>
</fieldset>
</form>
@stop