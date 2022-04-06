@extends('layouts.layout2')
@section('titulo','Mascotas')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('menu')
    <div class="row" style="display: none;">
        <a href="{{ url('/') }}">Inicio</a>
        {{--<a href="{{ url('/planfamiliar') }}">Familiar</a>--}}
        {{--<a href="{{ url('/planactua') }}">Actúa</a>--}}
        <div class="dropdown active">
            <button class="dropbtn" ondblclick="irPlanFamiliar()" style="color: white;">Plan Familiar<i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ url('/dashboard') }}" class="">Mi familia</a>
                <a href="{{ url('/mascotas') }}" class="">Mis Mascotas</a>
                <a href="{{ url('/planfamiliar') }}#identifica" class="">Identifica</a>
                <a href="{{ url('/planfamiliar') }}#planea" class="">Planea</a>
                <a href="{{ url('/planfamiliar') }}#organiza" class="">Organiza</a>
            </div> 
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <div class="dropdown">
            <button class="dropbtn" ondblclick="irPlanActua()">Plan Actúa<i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ url('/planactua') }}#incendio" class="">Incendio</a>
                <a href="{{ url('/planactua') }}#inundacion" class="">Inundación</a>
                <a href="{{ url('/planactua') }}#sismo" class="">Sismo</a>
                <a href="{{ url('/planactua') }}#brigada" class="">Brigada</a>
                <a href="{{ url('/planactua') }}#simulacro" class="">Simulacros</a>
            </div> 
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
    </div>
@endsection
@section('contenido')
<!--****************************************************************************-->
<div class="container">
	<div class="row">
		<div class="col-12 titulo1">
			<h3>Mis Animales de Compañía</h3>
			<hr>
			<p>El componente más importante de tu estrategia son los miembros de tu familia y también tus animales de compañía, por ello es importante que cada uno cuente con su Ficha de Seguridad.</p>
			<p>Mantén actualizada la información que has capturado. Descarga e imprime las fichas de tus mascotas, colócalas en la Mochila de Vida junto con los documentos importantes de Tu Plan Familiar.</p>
		</div>
	</div>
	<div class="text-right col-12">
		<a href="{{ route('mascotas.downloadSnappyPDF') }}" class="btn btn-red">Descargar</a>
		<a href="{{ route('mascotas.showSnappyPDF') }}" class="btn btn-red">Imprimir</a>
		<a href="{{route('mascotas.create')}}" class="btn botonA"></a>
	</div>
	<br>
	<div class="row">
		@forelse ($mascotas as $mascota)
			<div class="row ficha">
				<div class="col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 imagenmasc">
					<div class="form-row text-center">
						<div class="form-group">
							<div class="tarjetaFoto">
								@if(strpos( $mascota->foto_mascota, 'data:image/png;base64,') !==false OR strpos($mascota->foto_mascota, 'data:image/jpeg;base64,') !==false)
									<input type="image" name="imagen" id="imagen2" class="tamimg" src="{{ $mascota->foto_mascota }}" value="{{ $mascota->foto_mascota }}">
									<input type="text" name="imagen" value="{{ $mascota->foto_mascota }}" style="display: none">
								@else
									<input type="image" name="imagen" id="imagen2" class="tamig" src="data:image/png;base64,{{ $mascota->foto_mascota }}" value="{{ $mascota->foto_mascota }}">
									<input type="text" name="imagen" value="{{ $mascota->foto_mascota }}" style="display: none;">
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-9 col-md-9 col-lg-10 col-xl-10 dtsfam">
					<div class="form-row">
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="nombre_mascota">Nombre</label>
							<input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" value="{{ $mascota->nombre_mascota }}" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="edad">Edad</label>
							<input type="text" class="form-control" id="edad" name="edad" value="{{ $mascota->edad }}" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="raza">Raza</label>
							<input type="text" class="form-control" id="raza" name="raza" value="{{ $mascota->raza }}" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="numero_registro" class="lblnregistro">Número de Registro</label>
							<input type="text" class="form-control" id="numero_registro" name="numero_registro" value="{{ $mascota->numero_registro }}" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="aviso_emergencia">En caso de emergencia avisar a:</label>
							<input type="text" class="form-control" id="aviso_emergencia" name="aviso_emergencia" value="{{ $mascota->aviso_emergencia }}" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="telefono_emergencia" class="lbltelememasc">Teléfono</label>
							<input type="text" class="form-control" id="telefono_emergencia" name="telefono_emergencia" value="{{ $mascota->telefono_emergencia }}" disabled>
						</div>

						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="sexo_mascota">Sexo</label>
							<input type="text" class="form-control" id="sexo_mascota" name="sexo_mascota" value="{{ $mascota->sexo_mascota }}" disabled>
						</div>
						<div class="form-group col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center botonera">
							<a href="{{route('mascotas.edit',['mascota'=>$mascota])}}" class="btn btn-gray">Editar</a>
							<form class="btn" id="delete_{{$mascota->id}}" action="{{ route('mascotas.destroy',['mascota'=>$mascota]) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-red">Eliminar</button>
							</form>
						</div>
					</div>				
				</div>
			</div>
		@empty 
			<div class="alert alert-dark" role="alert">
				No has agregado a ninguna mascota, <a href="{{ route('mascotas.create') }}" class="alert-link">hazlo aqui</a>.
			</div>
		@endforelse
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(".botonG").on('click',function(e){
		e.preventDefault();
		var form = $(this).parents('form');
		Swal.fire({
	        title: "¿Deseas eliminar este registro?",
	        text: "¡No podrás recuperarlo más adelante!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "¡Aceptar!",
	        cancelButtonText: "Cancelar",
	        closeOnConfirm: false
	    }).then((res)=>{
	        if (res.value) form.submit();
	    });
	});
</script>
@endsection