@extends('layouts.layout1')

@section('titulo','PlanFamiliar')
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
            <form action="{{ route('submit_modulo') }}" method="POST">
                @csrf
                <div class="card text-center text-dark">
                  <div class="card-header">
                    Activar modulo
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">¿Deseas activar este modulo?</h5>
                    <p class="card-text">Al aceptar este modulo se agregará automaticamente a tu cuenta.</p>
                    <div class="d-flex mt-3 justify-content-around">
                        <button type="Submit" class="btn btn-primary">Activar</button>
                        <a href="https://claro360.ml/plataforma360/" class="btn btn-secondary">Regresar</a>
                        
                    </div>
                  </div>
                  <div class="card-footer text-muted">
                    Claro 360
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection