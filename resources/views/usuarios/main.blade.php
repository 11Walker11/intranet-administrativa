<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{asset('css\bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css\bootstrap.min')}}" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ASO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Inicio
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reporteRoles')}}">Roles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reporteUsuario')}}">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reportePaciente')}}">Pacientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reporteEnfermedades')}}">Enfermedades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reporteDatosalud')}}">Datos de salud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reporteConsultas')}}">Consultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cerrarsesion')}}">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@if (Session::has('sesionname'))
    <div>BIENVENIDO {{ Session::get('sesionname')}}
    <br>
    {{Session::get('sesiontipo')}}</div>
@endif
@yield('contenido')
</body>
</html>
