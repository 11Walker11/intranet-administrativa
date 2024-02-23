@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Listado Enfermedades</h1>
@stop

@section('content')
<a href="enfermedades/create" class="btn btn-primary mb-3">CREAR</a>
<table id="enfermedades" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Foto</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ( $enfermedades as $enfermedad )
    <tr>
        <td>{{$enfermedad->idenf}}</td>
        <td>{{$enfermedad->nombre}}</td>
        <td><img src = "{{asset('archivos/'.$enfermedad->ruta)}}" height=50 width=50></td>
        <td>
            <form action="{{route('enfermedades.destroy',$enfermedad->idenf)}}" method="POST">
                <a href="/enfermedades/{{$enfermedad->idenf}}/edit" class="btn btn-info">Editar</a>
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
