@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Agregar Vehículos')
@section('link','/vehicles')
@section('title','Propietarios')

@section('content')

<div id="list" class="row">
    <div class="col">
        <h2 class="font-weight-bold">Resultado de búsqueda</h2>
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
                @forelse ($result as $vehicle)
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
                            No se encontraron coincidencias, asegurese de colocar completa la placa
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
        <a class="btn btn-danger light btn-sl-sm" type="button" href="/listVehicles"><span class="mr-2"></span>Volver</a>
    </div>

   

    



</div>





@endsection