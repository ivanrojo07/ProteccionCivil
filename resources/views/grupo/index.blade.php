@extends('layouts.layout2')
@section('titulo','Inicio')
@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('menu')
    <div class="row" style="display: none;">
        <a href="{{ url('/') }}">Inicio</a>
        <div class="dropdown active">
            <button class="dropbtn" onclick="irPlanFamiliar()" style="color: white;">Plan Familiar<i class="fa fa-caret-down"></i>
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
            <button class="dropbtn" onclick="irPlanActua()">Plan Actúa<i class="fa fa-caret-down"></i>
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
			<h3>Mi Familia</h3>
			<hr>
			<p>El componente maś importante de tu estrategia son los miembros de tu familia así como tus animales de compañía, por ello es importante que cada uno cuente con su Ficha de Seguridad y la lleve a todos lados</p>
			<p>Complete el siguiente formulario con los datos de aquellos que habitan en tu hogar, agrega tantos familiares y animales de compañía sea necesario.</p>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-7 titulo2">
			<h3>Datos Generales</h3>
			<hr>
			<h4>Grupo:</h4>
			@if($grupos)
			<div class="form-row">
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="grupo">Tipo</label>
					<input type="text" class="form-control" id="grupo" value="{{ $grupos['grupos_tipo']['nombre'] }}" name="grupo" disabled>
				</div>
			</div>
			<h4 class="mt-2 mb-2">
				Administradores:
			</h4>
			@foreach ($grupos['users'] as $usuario)
				<div class="form-row mt-2 mb-2">
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<div class="tarjetaFoto w-75 h-100">
							<img src="{{$image_url.$usuario['avatar']}}" alt="" class="tamimg">
						</div>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="user_name">Cliente</label>
						<input type="text" class="form-control" id="user_name" value="{{ $usuario['name'] }}" name="user_name" disabled>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="email">Correo electrónico</label>
						<input type="text" class="form-control" id="email" value="{{ $usuario['email'] }}" name="email" disabled>
					</div>
				</div>
			@endforeach
			@endif
		</div>

		<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5">
			<h3>Mi familia</h3>
			<hr>
		</div>
	</div>
	<hr>
	<div class="text-right col-12">
		<a href="{{ route('grupos.pdfDownload') }}" class="btn btn-red">Descargar</a>
		<a href="{{ route('grupos.pdfShow') }}" class="btn btn-red">Imprimir</a>
		<a href="{{ route('grupos.no_users.create') }}" class="btn botonA"></a>
	</div>

	<div class="row">
		@foreach ($grupos['noneusers'] as $persona)
		<div class="row ficha">
			<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 imagenfam">
				<div class="form-row text-center">
					<div class="form-group">
						<div class="tarjetaFoto">
							 @if(strpos( $persona['avatar64'], 'data:image/png;base64,') !==false OR strpos($persona['avatar64'], 'data:image/jpeg;base64,') !==false)
			                  <input type="image" name="imagen" id="imagen2" class="tamimg" src="{{ $persona['avatar64'] }}" value="{{ $persona['avatar64'] }}">
			                  <input type="text" name="imagen" value="{{ $persona['avatar64'] }}" style="display: none">
			                  @else
			                  <input type="image" name="imagen" id="imagen2" class="tamig" src="data:image/png;base64,{{ $persona['avatar64'] }}" value="{{ $persona['avatar64'] }}">
			                  <input type="text" name="imagen" value="{{ $persona['avatar64'] }}" style="display: none;">
			                  @endif
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value='{{ $persona['nombre'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="apellido_p">Apellido Paterno</label>
						<input type="text" class="form-control" id="apellido_p" name="apellido_p" value='{{ $persona['paterno'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="apellido_m">Apellido Materno</label>
						<input type="text" class="form-control" id="apellido_m" name="apellido_m" value='{{ $persona['materno'] }}' disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tel_movil">Telefono movil</label>
						<input type="text" class="form-control" id="tel_movil" name="tel_movil" value='{{ $persona['telefono_movil'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tel_hogar">Telefono hogar</label>
						<input type="text" class="form-control" id="tel_hogar" name="tel_hogar" value='{{ $persona['telefono_hogar'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="genero">Genero</label>
						<input type="text" class="form-control" id="genero" name="genero" value='{{ $persona['genero'] }}' disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-2">
						<label for="codigo_postal">Código Postal</label>
						<input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value='{{$persona['codigo_postal']}}' disabled>
					</div>
					<div class="form-group col-10">
						<label for="direccion">Dirección</label>
						<input type="text" class="form-control" id="direccion" name="direccion" value='{{$persona['direccion']}}' disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="fecha_nacimiento">Fecha de nacimiento</label>
						<input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $persona['fechadenacimiento'] ? date('d-m-Y', strtotime($persona['fechadenacimiento'])) : 'N/A' }}" disabled>
					</div>
					<div class="form-group col-md-2">
						<label for="edad">Edad</label>
						<input type="text" class="form-control" id="edad" name="edad" value="{{ $persona['fechadenacimiento'] ? \Carbon\Carbon::parse($persona['fechadenacimiento'])->age : 'N/A' }}" disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="alergias">Alergias</label>
						<input type="text" class="form-control" id="alergias" name="alergias" value='{{ $persona['alergias'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="enfermedades">Enfermedades</label>
						<input type="text" class="form-control" id="enfermedades" name="enfermedades" value='{{ $persona['condicion_medica'] }}' disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tipo_sanguineo">Tipo Sanguíneo</label>
						<input type="text" class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" value='{{$persona['rh']}}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_seguro">Número de Seguro</label>
						<input type="text" class="form-control" id="numero_seguro" name="numero_seguro" value='{{ $persona['numero_seguro'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tipo_seguro">Tipo de Seguro</label>
						<input type="text" class="form-control" id="tipo_seguro" name="tipo_seguro" value='{{ $persona['tipo_seguro'] ? $persona['tipo_seguro'] : '' }}' disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre_emergencia">En caso de emergencia avisar a:</label>
						<input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" value='{{ $persona['emergencia_contacto'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="parentesco">Parentesco</label>
						<input type="text" class="form-control" id="parentesco" name="parentesco" value='{{ $persona['parentesco_contacto']  }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="telefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" name="telefono" value='{{ $persona['telefono_contacto']  }}' disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="discapacidad">Cuenta con alguna discapacidad</label>
						@if($persona['discapacidad']=='true')
						<input type="text" class="form-control" id="discapacidad" name="discapacidad" value='Si' disabled>
						@else
						<input type="text" class="form-control" id="discapacidad" name="discapacidad" value='No' disabled>
						@endif
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="parentesco">¿Cuál?</label>
						<input type="text" class="form-control" id="cual" name="cual" value='{{ $persona['tipo_discapacidad'] }}' disabled>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-center botonera">
						<br>
						<a href="{{ route('grupos.no_users.edit',['token_id'=>$persona['tokenid']]) }}" class="btn btn-gray">Editar</a>
						<form class="btn" id="delete_{{$persona['id']}}" action="{{ route('grupos.no_users.destroy',['id'=>$persona['id']]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-red botonesG">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function irMascotas(){
		window.location= rutaApp+'registromascota';
	};
	$(".botonesG").on('click',function(e){
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