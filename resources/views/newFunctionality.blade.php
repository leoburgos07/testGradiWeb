@extends('layouts.app')
@section('home','Gradiweb')

@section('title','Nueva Funcionalidad')

@section('content')
<div class="container">

    @for ($i=0;$i<count($data);$i++) 
        <h4>{{$data[$i][0]}} - {{$data[$i][1]}} - {{$data[$i][2]}} - {{$data[$i][3]}}</h4>
       
    @endfor

    <h2 class=" text-success"> Nueva funcionalidad en construccion</h2>

</div>











@endsection