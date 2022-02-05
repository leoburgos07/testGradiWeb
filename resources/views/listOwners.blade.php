@extends('layouts.app')
@section('home','Gradiweb')
@section('part','Agregar propietarios')
@section('link','/owners')
@section('search','Buscar propietarios')
@section('link2','/searchOwner')
@section('title','Propietarios')

@section('content')

<div class="container text-center  ">
    <h2 class="font-weight-bold">Listado de propietarios</h2>
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
            @forelse ($owners as $owner)
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
                <th>
                    <h3 class="text-primary">
                        No hay propietarios registrados actualmente.
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





@endsection