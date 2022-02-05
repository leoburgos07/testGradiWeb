@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Listar propietarios')
@section('link','/listOwners')
@section('search','Buscar propietarios')
@section('link2','/searchOwner')
@section('title','Propietarios')

@section('content')

<div class="container text-center">
    <h2 class="text-dark">Registro de Propietario</h2>
    <div class="compose-content ">
        <form method="POST" action="{{ url('/createOwner') }}" id="formOwner">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="nombre" class="form-control bg-transparent" id="nombre" placeholder=" Nombre">
                <p id="msgNombre"></p>
            </div>
            <div class="form-group">
                <input type="number" min="1000000000" max="9999999999" name="cc" class="form-control bg-transparent" id="cc" placeholder="Identificación, Ej: 1082957784">
                <p id="msgCC"></p>
            </div>
            <div class="form-group ">
                <input type="number" min="1000000000" max="9999999999" id="telefono" name="telefono" class=" form-control bg-transparent " placeholder="Telefono, Ej: 3214589687"></input>
                <p id="msgTelefono"></p>
                @if($errors->any())
                <h5 class="text-danger ">{{$errors->first()}}</h5>
                @endif
            </div>
            <div class="text-center mt-4 mb-5">
                <button class="btn btn-primary btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Guardar</button>
                <a class="btn btn-danger light btn-sl-sm" type="button" href="/"><span class="mr-2"></span>Volver</a>
                <br>
                @if (\Session::has('success'))
                    <p class="font-weight-bold text-success">{!! \Session::get('success') !!}</p> 
                @endif
                 

            </div>
        </form>

    </div>

</div>

@endsection