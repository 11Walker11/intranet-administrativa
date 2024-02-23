@extends('main')

@section('contenido')
    <form action="{{route('almacenaConsultas')}}" method="POST" enctype = "multipart/form-data">
    {{csrf_field()}}
  <fieldset>
    <legend>Alta Consulta</legend>
    
    <div class="mb-3">
            <label for="exampleSelect1" class="form-label mt-4">Paciente</label>
            <select class="form-select" aria-label="Default select example" name='idpa'>
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
      <input type="text" name = "fecha" value= "{{old('fecha')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe la fecha ejemplo: 2022-11-12">
    </div>

    <div class="mb-3">
            <label for="exampleSelect1" class="form-label mt-4">Usuarios</label>
            <select class="form-select" name='idusu'>
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
      <input type="text" name = "costo" value= "{{old('costo')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el costo del la consulta">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1" class="form-label mt-4">Foto</label>
    @if($errors->first('foto'))
      <p class="text-warning"> {{$errors->first('foto')}} </p>
    @endif
    <input type="file" name = "foto" value= "{{old('foto')}}" class="form-control"  placeholder="Selecciona una foto">
    </div>
    <div>
         <br>
         <button type="submit" class="btn btn-danger">Guardar Consulta</button>
         </br>
    </div>
</fieldset>
</form>
@stop