@extends('welcome')

@section('content')
<div class="row justify-content-around my-3">
    <div class="col-auto">
        <a class="btn btn-primary" href="{{route('inicio')}}">Volver</a>
    </div>
    <div class="col-auto">
        <h3 class="text-light">Pedidos pendientes</h3>
    </div>
</div>
<div class="row" id="cont" >
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
        let arreglo = <?php echo json_encode($pendi) ?>;
        // console.log(arreglo);
    function Listar(arreglo) {
        let titulos = ['Pedidos tipo 5', 'Pedidos tipo 6', 'Pedidos tipo 7'];
        let colores = ['success', 'info', 'secondary'];
        let cont = 0;
        for(let pend of arreglo) {
            let tit = titulos[cont];
            let col = colores[cont]
            $("#cont").append(`
                <div class="col-12 my-3 boton" onclick="entrar('${tit}')">
                    <span class=" text-light ">${tit}</span>
                    <div class="progress" style="height: 70px;">
                        <div class="progress-bar bg-${col}" role="progressbar" aria-label="Example with label" style="width: ${pend['NP']}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">${pend['NP']}</div>
                    </div>
                </div>
            `);
                cont += 1;
        }
    }
    Listar(arreglo);

    function entrar(tipo) {
        // console.log(tipo);

        let url = "pendi/"+tipo;
        
        $(location).attr('href', url);
    }


</script>
@endsection