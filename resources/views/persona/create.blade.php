@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Crear Persona</h3>
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
        {!! Form::open(array('url'=>'persona', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombrePersona" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">DPI</label>
            <input type="text" name="dpiPersona" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Direccion</label>
            <input type="text" name="direccionPersona" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Email</label>
            <input type="text" name="emailPersona" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Telefono</label>
            <input type="text" name="telefonoPersona" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Tipo de Persona</label>
            <select name="idTipo" class="form-control">
                @foreach($tipo as $tip)
                    <option value="{{$tip->idTipo}}" class="form-control">{{$tip->tipoPersona}}</option>
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