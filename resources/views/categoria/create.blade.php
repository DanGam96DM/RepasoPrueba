@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Crear Categoria</h3>
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
        {!! Form::open(array('url'=>'categoria', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Nombre Categoria</label>
            <input type="text" name="nombreCategoria" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Descripcion Categoria</label>
            <textarea name="descripcionCategoria" class="form-control" cols="30" rows="10" placeholder="Descripcion"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection