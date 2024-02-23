@extends('adminlte::page')

@section('title', 'ASO')

@section('content_header')
    <h1>ASO</h1>
@stop

@section('content')
    <p>Bienvenido al panel.</p>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cerrarsesion')}}">Cerrar Sesion</a>
        </li>
@if (Session::has('sesionname'))
    <div>BIENVENIDO {{ Session::get('sesionname')}}
    <br>
    {{Session::get('sesiontipo')}}</div>
@endif
@yield('contenido')
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop