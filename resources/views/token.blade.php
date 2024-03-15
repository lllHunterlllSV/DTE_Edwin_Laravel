@extends('layouts.app')

@section('content')
<div class="container  justify-content-center align-items-center ">
    <h3>Haz click en el botón para generar un token</h3>
    <button type="button" data-bs-toggle="modal" data-bs-target="#modal_generar" class="btn btn-primary">Generar Token</button>
</div>
<div class="container  justify-content-center align-items-center ">
    <div class="row">
        <div class="col-lg-12">
            <table class="table mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Token</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datos as $token)
                    <tr>
                        <td>{{$token['fecha']}}</td>
                        <td>{{$token['hora']}}</td>
                        <td class="overflow-auto text-break">{{$token['token']}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No hay datos</td>
                       

                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="container" id="xdxd">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tiempo restante para que el token expire:</div>

                <div class="card-body">
                    <div id="contador"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@include ('generar_token')

<script>
    function calcularTiempoRestante(fechaExpiracion, horaExpiracion) {
        // Crear un objeto Date con la fecha y hora de expiración
        var expiracion = new Date(fechaExpiracion + 'T' + horaExpiracion + 'Z');

        // Crear un objeto Date para la fecha y hora actual
        var ahora = new Date();

        // Si la fecha de expiración es anterior a la fecha actual, sumamos un día para obtener la fecha de expiración correcta
        if (expiracion < ahora) {
            expiracion.setDate(expiracion.getDate() + 1);
        }

        // Calcular la diferencia en milisegundos
        var diferencia = expiracion.getTime() - ahora.getTime();

        // Convertir la diferencia a horas, minutos y segundos
        var horas = Math.floor(diferencia / (1000 * 60 * 60));
        var minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
        var segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

        return { horas: horas, minutos: minutos, segundos: segundos };
    }

    function actualizarContador() {
        var contador = document.getElementById('contador');

        if ('{{ $ultimoToken["fecha"] }}' != 0) {
            var tiempoRestante = calcularTiempoRestante('{{ $fechaExpiracion }}', '{{ $ultimoToken["hora"] }}');

            contador.innerHTML = tiempoRestante.horas + 'h ' + tiempoRestante.minutos + 'm ' + tiempoRestante.segundos + 's';

            setTimeout(actualizarContador, 1000);
        } else {
            document.getElementById('xdxd').classList.add("d-none");
        }
    }

    actualizarContador();
</script>




@endsection
