@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Personas <a href="persona/create"><button class="btn btn-success fa fa-plus-circle" ></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="personas" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID Persona</th>
                    <th>Nombre</th>
                    <th>DPI</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                    <th>Ver</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#personas').DataTable({
        "processing":true,
        "searching":true,
        "serverSide":true,
        "responsive":true,
        "ajax":"{{route('personas')}}",
        columns:[
            {data:"idPersona", name:"idPersona"},
            {data:"nombrePersona", name:"nombrePersona"},
            {data:"dpiPersona", name:"dpiPersona"},
            {data:"direccionPersona", name:"direccionPersona"},
            {data:"emailPersona", name:"emailPersona"},
            {data:"telefonoPersona", name:"telefonoPersona"},
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-info fa fa-pencil" href="persona/'+full['idPersona']+'/edit"></a>';
                },
                name:"idPersona"
            },
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-primary delete fa fa-eye" href="persona/'+full['idPersona']+'"></a>';
                },
                name:"idPersona"
            }
        ]
    });
});
</script>
@endsection