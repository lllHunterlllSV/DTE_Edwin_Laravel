@extends('layouts.app')

@section('content')



<div class="container  justify-content-center align-items-center ">
    <h3>Haz click en el botón para agregar un emisor</h3>
<button type="button" data-bs-toggle="modal" data-bs-target="#modal_agregar" class="btn btn-primary">Agregar Emisor</button>
</div>
<div class="container  justify-content-center align-items-center ">
    <div class="row">
      <div class="col-lg-12">
        <table class="table mt-4">
          <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Actividad</th>
                <th scope="col">NIT</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
           @forelse ($datos as $emisor)
                        <tr>
                            <th>{{$emisor['id']}}</th>
                            <th>{{$emisor['nombre']}}</th>
                            <th>{{$emisor['actividad']}}</th>
                            <th>{{$emisor['nit']}}</th>
                            <th>{{$emisor['correo']}}</th>
                            <th>{{$emisor['telefono']}}</th>
                            <th>
                            <button value="Modificar" data-bs-toggle="modal" data-bs-target="#modal_modificar{{ $emisor['id'] }}" class="btn btn-success"><i class="fa-solid fa-pen"></i></button>
                            <button value="Eliminar" data-bs-toggle="modal" data-bs-target="#modal_eliminar{{ $emisor['id'] }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </th>
                            
                        </tr>
                        @include('emisor_modificar')
                        @include('emisor_eliminar')
            
           @empty
           <th>No hay datos</th>

           @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
    @include ('agregar_emisor')
@endsection
