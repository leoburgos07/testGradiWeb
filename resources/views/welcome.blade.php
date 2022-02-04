@extends('layouts.app')
@section('home','Gradiweb')
    @section('title', 'Test Gradiweb')
    @section('content')
    <div class="container text-center" >
    <h1>PRUEBA DESARROLLADOR WEB <br> <span class="text-success">GRADIWEB</span></h1>
       <a href="/vehicles" class="btn btn-dark">Vehiculos</a>
       <a href="/owners" class="btn btn-dark">Propietarios</a>
    </div>

    @endsection
    
