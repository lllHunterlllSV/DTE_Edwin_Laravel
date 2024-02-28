@extends('layouts.app')

@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="{{ asset('img/index-image.jpg') }}" class="d-block mx-lg-auto img-fluid shadow-lg" alt="Facturacion electronica" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">La Facturación electrónica es el futuro del país</h1>
        <p class="lead">Por eso es importante la creación de plantillas que optimicen todo el proceso, esta aplicación se encarga de que cualquier usuario pueda emitir un DTE utilizando una interfaz y funcionamiento intuitivo.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Aprende más aquí</button>
         
        </div>
      </div>
    </div>
  </div>
@endsection
