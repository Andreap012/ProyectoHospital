@extends('layouts.layout')

@section('titulo')
Resultado
@endsection

@section('contenido')
<h1 class="text-center">Resultado</h1>
<br><br>

@if($message = Session::get('exito'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<br><br>

<table class="table table-bordered">

    <thead>
        <th>Fecha</th>
    </thead>

    <tbody>
        @foreach ($diagnos2 as $diagnos2)
        <tr>
            <td>{{$diagnos2->fecha}}</td>
            <td>
                <form action="{{route('diagnos2.destroy', $diagnos2->id)}}" method="post">
                    <a href="{{route('diagnos2.show', $diagnos2->id)}}" class="btn btn-info">Mas información</a>
                    <a href="{{route('diagnos2.edit', $diagnos2->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<br><br>
<div class="row">
    <a href="{{route('diagnos2.create')}}"><button class="btn btn-success">Crear Resultado</button></a>
</div>
@endsection
