@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Agregar Vehículos')
@section('link','/vehicles')
@section('title','Propietarios')

@section('content')

<div id="list" class="row">
    <div class="col">
        <h2 class="font-weight-bold">Listado de vehículos</h2>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehicles as $vehicle)
                <tr>
                    <td>{{$vehicle->placa}}</td>
                    <td>{{$vehicle->marca}}</td>
                    <td>{{$vehicle->tipo}}</td>
                    <td>{{$vehicle->propietario}}</td>
                    <td>
                        <a href="/deleteVehicle/{{$vehicle->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
                @empty
                <tr>
                    <th>
                        <h3 class="text-primary">
                            No hay vehículos registrados actualmente.
                        </h3>
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if (\Session::has('success'))
        <p id="msgDelete" class="font-weight-bold text-success">{!! \Session::get('success') !!}</p>
        @endif
        @if($errors->any())
        <p class="text-danger ">{{$errors->first()}}</p>
        @endif
    </div>

    <div class="col">
        <h2 class="font-weight-bold">Listado de vehículos por marca</h2>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($marcas as $vehicle)
                <tr>
                    <td>{{$vehicle->marca}}</td>
                    <td>{{$vehicle->cantidad}}</td>
                </tr>
                @empty
                <tr>
                    <th>
                        <h3 class="text-primary">
                            No hay vehículos registrados actualmente.
                        </h3>
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div class="col-sm">

        <h2 class="text-dark font-weight-bold text-center">Buscar vehículo</h2>
        <div class="compose-content ">
            <form method="POST" action="{{ url('/searchVehicle') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" name="placa" class="form-control bg-transparent" placeholder="Placa">
                </div>
                <div class="text-center mt-4 mb-5">
                    <button class="btn btn-primary btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Buscar</button>

                </div>
            </form>



        </div>
    </div>



</div>





@endsection