@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Editar Categoria</h3>
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
        <h1>Nombre Categoria: {{$categoria->nombreCategoria}}</h1>
        <h1>Descripcion Categoria: {{$categoria->descripcionCategoria}}</h1>
    </div>
</div>
@endsection