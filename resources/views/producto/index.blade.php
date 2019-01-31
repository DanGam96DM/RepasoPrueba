@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Productos <a href="producto/create"><button class="btn btn-success fa fa-plus-circle" ></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="productos" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
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
    $('#productos').DataTable({
        "processing":true,
        "searching":true,
        "serverSide":true,
        "responsive":true,
        "ajax":"{{route('productos')}}",
        columns:[
            {data:"idProducto", name:"p.idProducto"},
            {data:"codigoProducto", name:"p.codigoProducto"},
            {data:"nombreProducto", name:"p.nombreProducto"},
            {data:"stockProducto", name:"p.stockProducto"},
            {data:"descripcionProducto", name:"p.descripcionProducto"},
            {data:"nombreCategoria", name:"c.nombreCategoria"},
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-info fa fa-pencil" href="producto/'+full['idProducto']+'/edit"></a>';
                },
                name:"p.idProducto"
            },
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-danger delete fa fa-trash" id="'+full['idProducto']+'"></a>';
                },
                name:"p.idProducto"
            }
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
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {
                window.location.href="producto/"+id;
                swal(
                'Eliminado!',
                'La persona ha sido eliminada',
                'success'
                )
            }
        });
    });
});
</script>
@endsection