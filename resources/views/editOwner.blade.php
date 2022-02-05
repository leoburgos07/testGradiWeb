@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Listar propietarios')
@section('link','/listOwners')
@section('title','Propietarios')
@section('content')

<div class="container text-center">
    <h2 class="text-dark">Editar Propietario</h2>
    <div class="compose-content ">
        <form method="POST" action="{{ url("/updateOwner/{$owner->id}") }}" id="formEditOwner">

            {!! csrf_field() !!}

            <div class="form-group">
                <label for="nombre" class="text-muted ">Nombre:</label>
                <input type="text" name="nombre" class="form-control bg-transparent" id="nombre" value="{{$owner['nombre']}}">
                <p id="msgNombre"></p>
            </div>
            <div class="form-group">
                <label for="cc" class="text-muted ">Identificación:</label>
                <input type="number" min="1000000000" max="9999999999" name="cc" class="form-control bg-transparent" id="cc" value="{{$owner['identificacion']}}">
                <p id="msgCC"></p>
            </div>
            <div class="form-group ">
                <label for="telefono" class="text-muted">Teléfono:</label>
                <input type="number" min="1000000000" max="9999999999" id="telefono" name="telefono" class=" form-control bg-transparent " value="{{$owner['telefono']}}"></input>
                <p id="msgTelefono"></p>
                @if($errors->any())
                <h5 class="text-danger ">{{$errors->first()}}</h5>
                @endif
            </div>
            <div class="text-center mt-4 mb-5">
                <button class="btn btn-primary btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Editar</button>
                <a class="btn btn-danger light btn-sl-sm" type="button" href="/listOwners"><span class="mr-2"></span>Volver</a>
                <br>
            </div>
        </form>

    </div>

</div>

@endsection