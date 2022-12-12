@extends('welcome')

@section('content') 
    <div class="row justify-content-around my-3">
        <div class="col-auto">
            <a class="btn btn-primary" href="{{route('inicio')}}">Volver</a>
        </div>
        <div class="col-auto">
            <h3 class="texto">Pedidos por consolidar</h3>
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
        .texto{
            font-size: 25px;
            font-weight: bold;
        }
        .opacidad{
            background: rgba(10, 10, 10, 0.3);
            border-radius: 10px;
        }
    </style>

@endsection

@section('js')
<script>
        let arreglo = <?php echo json_encode($conso) ?>;
        // console.log(arreglo);
    function Listar(arreglo) {
        let cont = 1;
        for(let cons of arreglo) {
            $("#cont").append(`
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    ${cont}° ${cons['NP']}
                </a>
            `);
                cont += 1;
        }
    }
    Listar(arreglo);



</script>
@endsection