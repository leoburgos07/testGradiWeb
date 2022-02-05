@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Listar vehículos')
@section('link','/listVehicles')
@section('title','Vehículos')

@section('content')

<div class="container text-center">
    <h2 class="text-dark">Registro de Vehículos</h2>
    <div class="compose-content ">
        <form method="POST" action="{{ url('/createVehicle') }}" id="formVehicle">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="placa" class="form-control bg-transparent" id="placa" placeholder="Placa, Ej: DDD658">
                <p id="msgPlaca"></p>
            </div>
            <div class="form-group">
                <input type="text" name="marca" class="form-control bg-transparent" id="marca" placeholder="Marca, Ej: Mazda">
                <p id="msgMarca"></p>
            </div>
            <div class="form-group ">
                <input type="text" id="tipo" name="tipo" class=" form-control bg-transparent " placeholder="tipo, Ej: Deportivo"></input>
                <p id="msgTipo"></p>
                @if($errors->any())
                <h5 class="text-danger ">{{$errors->first()}}</h5>
                @endif
            </div>
            <div class="form-group">
                <label for=""></label>
                <select name="select"  class="form-control form-control-sm" required >
                    <option value="">Selecciona un propietario</option>
                    @forelse ($owners as $owner)
                    <option  value="{{$owner['id']}}" >{{$owner['nombre']}}</option>
                    @empty
                    <option><span class="text-danger">No hay propietarios registrados</span></option>
                    @endforelse    
                </select>
                <p id="msgOption"></p>
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