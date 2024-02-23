@extends('adminlte::page')

@section('title', 'Reporte de Consultas')

@section('content_header')
    <h1>Reporte Consultas</h1>
@stop

@section('content')
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="css\bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css\bootstrap.min" rel="stylesheet" type="text/css" />
  </head>
  <h1>Reporte Consultas</h1>
  <br>
    @if (Session::has('mensaje'))
        <div>{{ Session::get('mensaje')}}</div>
    @endif
    @if(Session::get('sesiontipo')=="admin")
    <a href="{{ route('altaConsultas')}}"> <button type="button" class="btn btn-success">Alta Consultas</button> </a>
    @endif

    <table class="table table-hover">
        <thead>
          <tr>
            
            <th scope="col">ID</th>
            <th scope="col">ID Paciente</th>
            <th scope="col">Fecha</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">Costo</th>
            <th scope="col">Foto</th>
            @if(Session::get('sesiontipo')=="admin")
            <th scope="col">Acciones</th>
            @endif
          </tr>
        </thead>
        @foreach($consultas as $c)
        <tbody>
            <tr class="table-active">
              <th scope="row">{{$c->idco}}</th>
              <td>{{$c->paciente}}</td>
              <td>{{$c->fecha}}</td>
              <td>{{$c->usuario}}</td>
              <td>{{$c->costo}}</td>
              <td><img src = "{{asset('archivos/'.$c->ruta)}}" height="50" width="50"></td>
              <td>
                @if(Session::get('sesiontipo')=="admin")
                <a href="{{route('modificaConsultas',['id'=>$c->idco])}}"><button type="button" class="btn btn-warning">Editar</button></a>
                <a href="{{route('eliminaConsultas',['id'=>$c->idco])}}"><img src = "{{asset('borra.JPG')}}" height="50" width="100"></a>
                @endif
              </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <meta charset="utf-8">
    <link href="css\bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css\bootstrap.min" rel="stylesheet" type="text/css" />
@stop
