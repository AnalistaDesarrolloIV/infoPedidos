@extends('welcome')

@section('content')
<div class="row justify-content-around my-3">
    <div class="col-auto">
        <a class="btn btn-primary" href="{{route('inicio')}}">Volver</a>
    </div>
    <div class="col-auto">
        <h3 class="texto">Pedidos con error</h3>
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
        let arreglo = <?php echo json_encode($error) ?>;
        // console.log(arreglo);
    function Listar(arreglo) {
        let cont = 1;
        for(let er of arreglo) {
            $("#cont").append(`
                <button onclick="alert(${er['eo_descr']})" class="list-group-item list-group-item-action" aria-current="true">
                    ${cont}° ${er['eo_descr']} : ${er['eo_nota2']}
                </button>
            `);
                cont += 1;
        }
    }
    Listar(arreglo);
    function alert(id) {
        Swal.fire({
        title: '¿Seguro?',
        text: "seguro de modificar las lineas de erros del pedido "+id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡si, seguro!'
        }).then((result) => {
        if (result.isConfirmed) {
            
            let url = "/delete/"+id;
            
            $(location).attr('href', url);

        }
        })
    }


</script>
@endsection