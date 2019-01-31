@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Ver Persona: {{$persona->nombrePersona}}</h3>
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
        <h1>ID: {{$persona->idPersona}}</h1>
        <h1>Nombre: {{$persona->nombrePersona}}</h1>
        <h1>DPI: {{$persona->dpiPersona}}</h1>
        <h1>Direccion: {{$persona->direccionPersona}}</h1>
        <h1>Email: {{$persona->emailPersona}}</h1>
        <h1>Telefono: {{$persona->telefonoPersona}}</h1>
    </div>
</div>
@endsection