@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Crear Ingreso</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

{!! Form::open(array('url'=>'ingreso', 'method'=>'POST', 'autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Proveedor</label>
                <select name="idPersona" id="idPersona"class="form-control selectpicker" data-live-search="true">
                    @foreach($persona as $per)
                        <option value="{{$per->idPersona}}" class="form-control">{{$per->nombrePersona}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="nombre">Tipo de comprobante</label>
                <select name="tipocomprobanteIngreso" class="form-group">
                    <option value="Boleta">Boleta</option>
                    <option value="Recibo">Recibo</option>
                    <option value="Factura">Factura</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="nombre">Serie de comprobante</label>
                <input type="text" name="seriecomprobanteIngreso" class="form-control" placeholder="seriecomprobanteIngreso">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="nombre">Num. de comprobante</label>
                <input type="text" name="numcomprobanteIngreso" required class="form-control" placeholder="numcomprobanteIngreso">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Producto</label>
                            <select name="pProducto" id="pProducto"class="form-control selectpicker" data-live-search="true">
                                @foreach($producto as $pro)
                                    <option value="{{$pro->idProducto}}" class="form-control">{{$pro->nombreProducto}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="pcantidadIngreso" id="pcantidadIngreso" class="form-control" placeholder="Cantidad">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad">Precio de Compra</label>
                            <input type="number" name="ppreciocompraIngreso" id="ppreciocompraIngreso" class="form-control" placeholder="Precio Compra">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad">Precio de Venta</label>
                            <input type="number" name="pprecioventaIngreso" id="pprecioventaIngreso" class="form-control" placeholder="Precio Venta">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad">Agregar al Detalle</label>
                            <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Opciones</th>
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">Q. 0.00</h4></th>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="guardar">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
                <button class="btn btn-danger fa fa-times" type="reset"></button>
            </div>
        </div>
    </div>
{{Form::close()}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@push('scripts')
<script>
$(document).ready(function() {
    $("#bt_add").click(function(){
        agregar();
    });
});
var cont=0;
total=0;
subtotal=[];
$("#guardar").hide();
function agregar(){
    idProducto=$("#pProducto").val();
    nombreProducto=$("pProducto option:selected").text();
    cantidadIngreso=$("#pcantidadIngreso").val();
    preciocompraIngreso=$("#ppreciocompraIngreso").val();
    precioventaIngreso=$("#pprecioventaIngreso").val();
    if(idProducto!="" && cantidadIngreso!="" && cantidadIngreso>0 && preciocompraIngreso!="" && precioventaIngreso!=""){
        subtotal[cont]=(cantidadIngreso*preciocompraIngreso);
        total=total+subtotal[cont];
        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+nombreProducto+'</td><td><input type="number" name="cantidadIngreso[]" value="'+cantidadIngreso+'"></td><td><input type="number" name="preciocompraIngreso[]" value="'+preciocompraIngreso+'"></td><td><input type="number" name="precioventaIngreso[]" value="'+precioventaIngreso+'"></td><td>'+subtotal[cont]+'</td></tr>'
        cont++;
        limpiar();
        $("#total").html("Q. "+total);
        evaluar();
        $("#detalles").append(fila);
    }
    else{
        alert("Error revise los detalles del articulo");
    }
}
function limpiar(){
    $("#pcantidadIngreso").val("");
    $("#ppreciocompraIngreso").val("");
    $("#pprecioventaIngreso").val("");
}
function evaluar(){
    if(total>0){
        $("#guardar").show();
    }
    else
    {
        $("#guardar").hide();
    }
}
function eliminar(index){
    total=total-subtotal[index];
    $("#total").html("Q. "+total);
    $("#fila"+index).remove();
    evaluar();
}
</script>
@endpush
@endsection