@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Crear Producto</h3>
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
        {!! Form::open(array('url'=>'producto', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Codigo</label>
            <input type="text" name="codigoProducto" class="form-control" placeholder="Codigo">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombreProducto" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Stock</label>
            <input type="text" name="stockProducto" class="form-control" placeholder="Stock">
        </div>
        <div class="form-group">
            <label for="nombre">Descripcion</label>
            <input type="text" name="descripcionProducto" class="form-control" placeholder="Descripcion">
        </div>
        <div class="form-group">
            <label for="nombre">Categoria</label>
            <select name="idCategoria" class="form-control">
                @foreach($categoria as $cat)
                    <option value="{{$cat->idCategoria}}" class="form-control">{{$cat->nombreCategoria}}</option>
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