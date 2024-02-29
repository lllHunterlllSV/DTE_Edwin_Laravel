<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite([ 'resources/js/app.js', 'resources/css/app.scss'])
    <script src="/main.js"></script>
    <script src="https://kit.fontawesome.com/9f312215fd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg menu mb-5">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{route('inicio')}}"><i class="fa-solid fa-clipboard"></i>Facturación Electrónica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav" id="listamenu">
        <li class="nav-item ms-3">
          <a class="nav-link text-white" href="">Historial. Tokens</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link text-white" href="{{route('emisor')}}">Historial. Emisor</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link text-white" href="">Historial. Receptor</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link text-white" href="">Historial. DTE</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link text-white" href="">Eventos de contingencia</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link text-white" href="">Eventos de invalidación</a>
        </li>
        
        
      </ul>
    </div>

    <div class="btn-group">
      
      <a class="nav-link text-white " href="">Envios de DTE</a>
      
      <div class="ms-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Usuario

      </div>

  <ul class="dropdown-menu dropdown-menu-end">
    <li><button class="dropdown-item" type="button">Configuración</button></li>
    <li><button class="dropdown-item" type="button">Soporte Tecnico</button></li>
    <li><button class="dropdown-item" type="button">Decimales</button></li>
    <li><a href="" class="dropdown-item" type="button">Seccion de Token</a></li>
  </ul>
</div>
    
  </div>
</nav>


@yield('content')
</body>
</html>