@extends('main')

@section('contenido')
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="css\bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css\bootstrap.min" rel="stylesheet" type="text/css" />
  </head>
  <h1>Reporte Datos Salud </h1>
  <br>
    @if (Session::has('mensaje'))
        <div>{{ Session::get('mensaje')}}</div>
    @endif
    @if(Session::get('sesiontipo')=="admin")
    <a href="{{ route('altaDatosalud')}}"> <button type="button" class="btn btn-success">Alta de Datos Salud</button> </a>
    @endif

    <table class="table table-hover">
        <thead>
          <tr>
            
            <th scope="col">ID</th>
            <th scope="col">ID Paciente</th>
            <th scope="col">Peso</th>
            <th scope="col">Estatura</th>
            <th scope="col">IMC</th>
            <th scope="col">Edad</th>
            <th scope="col">Sexo</th>
            <th scope="col">ID Enfermedad</th>
            @if(Session::get('sesiontipo')=="admin")
            <th scope="col">Acciones</th>
            @endif
          </tr>
        </thead>
        @foreach($datosaluds as $ds)
        <tbody>
            <tr class="table-active">
              <th scope="row">{{$ds->idds}}</th>
              <td>{{$ds->paciente}}</td>
              <td>{{$ds->peso}}</td>
              <td>{{$ds->estatura}}</td>
              <td>{{$ds->imc}}</td>
              <td>{{$ds->edad}}</td>
              <td>{{$ds->sexo}}</td>
              <td>{{$ds->enfermedad}}</td>
              <td>
                @if(Session::get('sesiontipo')=="admin")
                <a href="{{route('modificaDatosalud',['id'=>$ds->idds])}}"><button type="button" class="btn btn-warning">Editar</button></a>
                <a href="{{route('eliminaDatosalud',['id'=>$ds->idds])}}"><img src = "{{asset('borra.JPG')}}" height="50" width="100"></a>
                @endif
              </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@stop
