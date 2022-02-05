@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Agregar propietarios')
@section('link','/owners')
@section('search','Listar propietarios')
@section('link2','/listOwners')  
@section('title','Propietarios')

@section('content')


<div class="container text-center ">
    <div class="row text-center">
        <h2 class="font-weight-bold">Propietarios encontrados</h2>
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
    <a class="btn btn-danger light btn-sl-sm" type="button" href="/searchOwner"><span class="mr-2"></span>Volver</a>

</div>





@endsection