@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Ingresos <a href="ingreso/create"><button class="btn btn-success fa fa-plus-circle" ></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="ingresos" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Tipo Comprobante</th>
                    <th>Serie</th>
                    <th>Numero Comprobante</th>
                    <th>Impuesto</th>
                    <th>Estado</th>
                    <th>Total</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#ingresos').DataTable({
        "processing":true,
        "searching":true,
        "serverSide":true,
        "responsive":true,
        "ajax":"{{route('ingresos')}}",
        columns:[
            {data:"idIngreso", name:"i.idIngreso"},
            {data:"fechahoraIngreso", name:"i.fechahoraIngreso"},
            {data:"nombrePersona", name:"p.nombrePersona"},
            {data:"tipocomprobanteIngreso", name:"i.tipocomprobanteIngreso"},
            {data:"seriecomprobanteIngreso", name:"i.seriecomprobanteIngreso"},
            {data:"numcomprobanteIngreso", name:"i.numcomprobanteIngreso"},
            {data:"impuestoIngreso", name:"i.impuestoIngreso"},
            {
                data: 'idEstado', 
                searchable: false,
              render: function(data) { 
                if(data=='1') {
                  return '<label>pagado</label>';
                }
                else {
                  return '<label>pendiente</label>';
                }

              }},
            {data:"total", name:"total", searchable: false}
        ]
    });
    $(document).on('click','.delete', function(){
        var id=$(this).attr('id');
        console.log(id);
        swal({
            title: 'Estas seguro?',
            text: "No podras revertirlo!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Pagar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {
                window.location.href="ingreso/"+id;
                swal(
                'Pagado!',
                'El ingreso ha sido Pagado',
                'success'
                )
            }
        });
    });
});
</script>
@endsection