@extends('layouts.layout1')
@section('titulo','Plan Familiar')
@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('css/inicio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/registrafamiliar.css') }}">
@endsection
@section('contenido')

<!--***********************************************************************************************************-->
<div class="container">
    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('error')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="formulario col-6 offset-4">
            <form action="{{route('login_submit')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email" class="text-dark">Email</label>
                        <input type="email" class="form-control" id="email"  name="email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password" class="text-dark">Password</label>
                        <input type="password" class="form-control" id="password"  name="password">
                    </div>
                    <div class="botonesDireccion">
                        <button type="submit" class="btn botonesDash12">Iniciar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection