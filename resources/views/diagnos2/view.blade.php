@extends('layouts.layout')

@section('titulo')
Resultado
@endsection

@section('contenido')
    <h1 class="text-center" >Resultado</h1>
    <br><br>

    <div class="row"></div>
    
    <div class="row">
        <div class="col-sm-3">
            <h3>Fecha: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$diagnos2->fecha}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Codigo del Diagnostico:</h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$diagnos2->diagnostico}}</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Paciente: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$diagnos2->paciente}}</p>
        </div>
    </div>
    <br><br>

<div class="row">
    <a href="{{route('diagnos2.index')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection