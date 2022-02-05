@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Agregar propietarios')
@section('link','/owners')
@section('search','Listar propietarios')
@section('link2','/listOwners')
@section('title','Propietarios')

@section('content')


<div class="container ">
    <div class="row ">
        <h2 class="font-weight-bold" >Propietarios encontrados</h2>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Identificación</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $owner)
                <tr>
                    <td>{{$owner['nombre']}}</td>
                    <td>{{$owner['identificacion']}}</td>
                    <td>{{$owner['telefono']}}</td>
                    <td><a href="/editOwner/{{$owner['id']}}"><i class="fas fa-pen-square"></i></a>
                        <a href="/deleteOwner/{{$owner['id']}}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <h3 class="text-primary">
                            No se encontraron coincidencias.
                        </h3>
                    </td>
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
    <div class="row">
        <h2 class="font-weight-bold" >Vehículos vinculados</h2>
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
                @forelse ($resultsVehicles as $vehicle)
                @for ($i=0;$i<count($vehicle);$i++)
                    
                
                <tr>
                    <td>{{$vehicle[$i]->placa}}</td>
                    <td>{{$vehicle[$i]->marca}}</td>
                    <td>{{$vehicle[$i]->tipo}}</td>
                    <td>{{$vehicle[$i]->propietario}}</td>
                    <td>
                        <a href="/deleteVehicle/{{$vehicle[$i]->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
                @endfor
                @empty
                <tr>
                    <th>
                        <h3 class="text-primary">
                            La persona no posee vehículos.
                        </h3>
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <a class="btn btn-danger light btn-sl-sm"  type="button" href="/searchOwner"><span class="mr-2"></span>Volver</a>

</div>





@endsection