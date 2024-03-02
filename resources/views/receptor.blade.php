@extends('layouts.app')

@section('content')



<div class="container  justify-content-center align-items-center ">
    <h3>Haz click en el botón para agregar un receptor</h3>
<button type="button" data-bs-toggle="modal" data-bs-target="#modal_agregar" class="btn btn-primary">Agregar Receptor</button>
</div>
<div class="container  justify-content-center align-items-center ">
    <div class="row">
      <div class="col-lg-12">
        <table class="table mt-4">
          <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo documento</th>
                <th scope="col">N° documento</th>
                <th scope="col">NRC</th>
                <th scope="col">Derpatamento</th>
                <th scope="col">Municipio</th>
                <th scope="col">Complemento</th>
                <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
           @forelse ($datos as $receptor)
                        <tr>
                            <th>{{$receptor['id']}}</th>
                            <th>{{$receptor['nombre']}}</th>
                            <th>{{$receptor['tipodocumento']}}</th>
                            <th>{{$receptor['ndocumento']}}</th>
                            <th>{{$receptor['nrc']}}</th>
                            <th>{{$receptor['departamento']}}</th>
                            <th>{{$receptor['municipio']}}</th>
                            <th>{{$receptor['complemento']}}</th>
                            <th>
                            <button value="Modificar" data-bs-toggle="modal" data-bs-target="#modal_modificar{{ $receptor['id'] }}" class="btn btn-success"><i class="fa-solid fa-pen"></i></button>
                            <button value="Eliminar" data-bs-toggle="modal" data-bs-target="#modal_eliminar{{ $receptor['id'] }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </th>
                            
                        </tr>
                        @include('receptor_modificar')
                        @include('receptor_eliminar')
                        
            
           @empty
           <th>No hay datos</th>

           @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
    @include ('agregar_receptor')
@endsection
