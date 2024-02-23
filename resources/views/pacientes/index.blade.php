@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Listado Pacientes</h1>
@stop

@section('content')
<a href="pacientes/create" class="btn btn-primary mb-3">CREAR</a>
<table id="pacientes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">ApellidoP</th>
        <th scope="col">ApellidoM</th>
        <th scope="col">Edad</th>
        <th scope="col">Estado</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Calle</th>
        <th scope="col">Colonia</th>
        <th scope="col">Activo</th>
        <th scope="col">Noexp</th>
        <th scope="col">Foto</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ( $pacientes as $paciente )
    <tr>
        <td>{{$paciente->idpa}}</td>
        <td>{{$paciente->nombrep}}</td>
        <td>{{$paciente->apellidop}}</td>
        <td>{{$paciente->apellidom}}</td>
        <td>{{$paciente->edad}}</td>
        <td>{{$paciente->estado}}</td>
        <td>{{$paciente->correo}}</td>
        <td>{{$paciente->telefono}}</td>
        <td>{{$paciente->calle}}</td>
        <td>{{$paciente->colonia}}</td>
        <td>{{$paciente->activo}}</td>
        <td>{{$paciente->noexp}}</td>
        <td><img src = "{{asset('archivos/'.$paciente->ruta)}}" height=50 width=50></td>
        <td>
            <form action="{{route('pacientes.destroy',$paciente->idpa)}}" method="POST">
                <a href="/pacientes/{{$paciente->idpa}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#mascotas').DataTable({
        "lengthMenu": [[5,10,50, -1],[5,10,50,"ALL"]]
    });
});
</script>
@stop
