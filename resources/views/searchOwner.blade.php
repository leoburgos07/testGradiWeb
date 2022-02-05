@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Agregar propietarios')
@section('link','/owners')
@section('search','Listar propietarios')
@section('link2','/listOwners')     
@section('title','Propietarios')

@section('content')


<div class="container busqueda">
    <h2 class="text-dark font-weight-bold text-center">Busqueda de propietario por nombre</h2>
    <div class="compose-content ">
        <form method="POST" action="{{ url('/searchNameOwner') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="nombre" class="form-control bg-transparent" placeholder=" Nombre">
                <!-- <p id="msgNombre"></p> -->
            </div>
            <div class="text-center mt-4 mb-5">
                <button class="btn btn-primary btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Buscar</button>
                
            </div>
        </form>

    </div>

</div>
<div class="container busqueda">
    <h2 class="text-dark font-weight-bold text-center">Busqueda de propietario por identificación</h2>
    <div class="compose-content ">
        <form method="POST" action="{{ url('/searchIdentificationOwner') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="identificacion" class="form-control bg-transparent" placeholder=" Identificación">
                <!-- <p id="msgNombre"></p> -->
            </div>
            <div class="text-center mt-4 mb-5">
                <button class="btn btn-primary btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Buscar</button>
                
            </div>
        </form>

    </div>

</div>





@endsection