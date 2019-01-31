@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success fa fa-plus-circle" ></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="categorias" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID Categoria</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
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
    $('#categorias').DataTable({
        "processing":true,
        "searching":true,
        "serverSide":true,
        "responsive":true,
        "ajax":"{{route('categorias')}}",
        columns:[
            {data:"idCategoria", name:"idCategoria"},
            {data:"nombreCategoria", name:"nombreCategoria"},
            {data:"descripcionCategoria", name:"descripcionCategoria"},
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-info fa fa-pencil" href="categoria/'+full['idCategoria']+'/edit"></a>';
                },
                name:"idCategoria"
            },
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-danger delete fa fa-trash" id="'+full['idCategoria']+'"></a>';
                },
                name:"idCategoria"
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
                window.location.href="categoria/"+id;
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
