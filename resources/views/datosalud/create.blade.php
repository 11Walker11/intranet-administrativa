@extends('main')

@section('contenido')
    <form action="{{route('almacenaDatosalud')}}" method="POST" enctype = "multipart/form-data">
{{csrf_field()}}
  <fieldset>
    <legend>Alta Datos Salud</legend>
    
    <div class="mb-3">
            <label for="exampleSelect1" class="form-label mt-4">Paciente</label>
            <select class="form-select" aria-label="Default select example" name='idpa'>
              @foreach($pacientes as $p)
              <option value = '{{$p->id}}'>{{$p->nombrep}}</option>
              @endforeach
            </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Peso</label>
      @if($errors->first('peso'))
        <p class="text-warning"> {{$errors->first('peso')}} </p>
      @endif
      <input type="text" name = "peso" value= "{{old('peso')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escrie el peso de paciente">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Estatura</label>
      @if($errors->first('estatura'))
        <p class="text-warning"> {{$errors->first('estatura')}} </p>
      @endif
      <input type="text" name = "estatura" value= "{{old('estatura')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe la estatura del paciente en metros">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">IMC</label>
      @if($errors->first('imc'))
        <p class="text-warning"> {{$errors->first('imc')}} </p>
      @endif
      <input type="text" name = "imc" value= "{{old('imc')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe el indice de masa corporal del paciente">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Edad</label>
      @if($errors->first('edad'))
        <p class="text-warning"> {{$errors->first('edad')}} </p>
      @endif
      <input type="text" name = "edad" value= "{{old('edad')}}" class="form-control" aria-describedby="emailHelp" placeholder="Escribe la edad del paciente en años">
    </div>

    <fieldset class="form-group">
      <legend class="mt-4">Sexo</legend>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sexo" value="Masculino" checked="">
        <label class="form-check-label" for="optionsRadios1">
          Masculino
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="sexo" value="Femenino">
        <label class="form-check-label" for="optionsRadios2">
          Femenino
        </label>
      </div>
      <div class="mb-3">
            <label for="exampleSelect1" class="form-label mt-4">Enfermedad</label>
            <select class="form-select" aria-label="Default select example" name='idenf'>
              @foreach($enfermedades as $e)
              <option value = '{{$e->id}}'>{{$e->nombre}}</option>
              @endforeach
            </select>
    </div>
    </fieldset>

    <div>
         <br>
         <button type="submit" class="btn btn-danger">Guardar Datos</button>
         </br>
    </div>
</fieldset>
</form>
@stop