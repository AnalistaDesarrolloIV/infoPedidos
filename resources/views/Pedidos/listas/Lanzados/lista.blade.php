@extends('welcome')

@section('content')
<div class="row justify-content-around my-3">
    <div class="col-auto">
        <a class="btn btn-primary" href="{{route('inicio')}}">Volver</a>
    </div>
    <div class="col-auto">
        <h3 class="text-light">Pedidos lanzados</h3>
    </div>
</div>
<div class="row" >
    <div class="list-group" id="cont" >
      </div>
</div>
@endsection

@section('css')
    <style>
        .boton{
            cursor: pointer;
        }
    </style>

@endsection

@section('js')
<script>
        let arreglo = <?php echo json_encode($lanza) ?>;
        // console.log(arreglo);
    function Listar(arreglo) {
        let cont = 1;
        for(let lans of arreglo) {
            $("#cont").append(`
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    ${cont}° ${lans['d']}
                </a>
            `);
                cont += 1;
        }
    }
    Listar(arreglo);



</script>
@endsection