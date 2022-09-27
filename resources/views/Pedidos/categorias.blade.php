@extends('welcome')

@section('content')
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
        let arreglo = <?php echo json_encode($invoices) ?>;
        // console.log(arreglo);
    function Listar(arreglo) {
        let titulos = ['Pedidos pendientes', 'Pedidos lanzados', 'Pedidos para consolidar', 'pedidos con error'];
        let colores = ['warning', 'success', 'info', 'danger'];
        let cont = 0;
        for(let categorias of arreglo) {
            let tit = titulos[cont];
            let col = colores[cont]
            $("#cont").append(`
                <div class="col-12 my-4 boton" onclick="entrar('${tit}')">
                    <span class=" text-light ">${tit}</span>
                    <div class="progress" style="height: 70px;">
                        <div class="progress-bar bg-${col}" role="progressbar" aria-label="Example with label" style="width: ${categorias['NP']}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">${categorias['NP']}</div>
                    </div>
                </div>
            `);
                cont += 1;
        }
    }
    Listar(arreglo);

    function entrar(tipo) {
        let url ='';
        if (tipo == "Pedidos pendientes") {
            url = "{{route('pendientes')}}";
        }else if(tipo == "Pedidos lanzados"){
            url = "{{route('lanzados')}}";
        }else if(tipo == "Pedidos para consolidar"){
            url = "{{route('consolidar')}}";
        }else {
            url = "{{route('error')}}";
        }
        
        $(location).attr('href', url);
    }


</script>
@endsection