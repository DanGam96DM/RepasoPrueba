@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Editar Producto: {{$producto->nombreProducto}}</h3>
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
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        {!! Form::model($producto, ['method'=>'PATCH', 'route'=>['producto.update', $producto->idProducto]]) !!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Codigo</label>
            <input type="text" name="codigoProducto" value="{{$producto->codigoProducto}}" class="form-control" placeholder="Codigo">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombreProducto" value="{{$producto->nombreProducto}}" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Stock</label>
            <input type="text" name="stockProducto" value="{{$producto->stockProducto}}" class="form-control" placeholder="Stock">
        </div>
        <div class="form-group">
            <label for="nombre">Descripcion</label>
            <input type="text" name="descripcionProducto" value="{{$producto->descripcionProducto}}" class="form-control" placeholder="Descripcion">
        </div>
        <div class="form-group">
            <label for="nombre">Tipo de Persona</label>
            <select name="idCategoria" class="form-control">
                @foreach($tipo as $tip)
                    @if($tip->idCategoria==$producto->idCategoria)
                        <option value="{{$tip->idCategoria}}" class="form-control" selected >{{$tip->nombreCategoria}}</option>
                    @else
                        <option value="{{$tip->idCategoria}}" class="form-control">{{$tip->nombreCategoria}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection