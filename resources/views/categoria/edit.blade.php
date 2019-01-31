@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Editar Categoria: {{$categoria->nombreCategoria}}</h3>
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
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        {!! Form::model($categoria, ['method'=>'PATCH', 'route'=>['categoria.update', $categoria->idCategoria]]) !!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Nombre Categoria</label>
            <input type="text" name="nombreCategoria" value="{{$categoria->nombreCategoria}}" class="form-control" placeholder="{{$categoria->nombreCategoria}}">
        </div>
        <div class="form-group">
            <label for="nombre">Descripcion Categoria</label>
            <input type="textarea" name="descripcionCategoria" value="{{$categoria->descripcionCategoria}}" class="form-control" placeholder="{{$categoria->descripcionCategoria}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection