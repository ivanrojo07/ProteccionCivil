@extends('layouts.layout2')
@section('titulo','Inicio')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('menu')
    <div class="row">
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
				<h4>Dirección:</h4>
				@if($dato_general)
					<div class="form-row dtsdir">
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="calle">Calle</label>
							<input type="text" class="form-control" id="calle" value="{{ $dato_general->calle }}" name="calle" disabled>
						</div>
						<div class="form-group col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="numeroExt">Número Exterior</label>
							<input type="text" class="form-control" id="numeroExt" value="{{ $dato_general->numero_exterior }}" name="numeroExt" disabled>
						</div>
						<div class="form-group col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="numeroInt">Número Interior</label>
							<input type="text" class="form-control" id="numeroInt" value="{{ $dato_general->numero_interior }}" name="numeroInt" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="codigoPostal" class="">C.P.</label>
							<input type="text" class="form-control" id="codigoPostal" value="{{ $dato_general->codigo_postal }}" name="codigoPostal" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="estado">Estado</label>
							<input type="text" class="form-control" id="estado" value="{{ $dato_general->estado }}" name="estado" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="alcaldia">Alcaldía o Municipio</label>
							<input type="text" class="form-control" id="alcaldia" value="{{ $dato_general->alcaldia }}" name="alcaldia" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="colonia" class="lblcolonia">Colonia</label>
							<input type="text" class="form-control" id="colonia" value="{{ $dato_general->colonia }}" name="colonia" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="numero_pisos" class="lblpisos">Número de Pisos en su Hogar</label>
							<input type="text" class="form-control" id="numero_pisos" value="{{ $dato_general->pisos_hogar }}" name="numero_pisos" disabled>
						</div>
						<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
							<label for="riesgo" class="lblriesgo">¿Considera que su hogar se encuentra en una zona de riesgo?</label>
							<input type="text" class="form-control" id="riesgo" value="{{ $dato_general->zona_riesgo }}" name="riesgo" disabled>
						</div>
					</div>
					<br>
					<div class="text-center">
						<a href="{{ route('dato_general.edit') }}" class="btn btn-gray">Editar</a>
						{{-- <button type="submit" class="btn botonesDash12">Guardar</button> --}}
					</div>
				@else
					<div class="alert alert-dark" role="alert">
						No has agregado la dirección de tu hogar, <a href="{{ route('dato_general.form') }}" class="alert-link">hazlo aqui</a>.
					</div>
				@endif
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 mifamilia">
				<h3>Mi familia</h3>
				<hr>
				<h4>Habitantes:</h4>
				<div class="form-row">
					<div class="form-group col-12">
						<label for="personas" class="personas">Personas habitando en mi hogar</label>
						<input type="text" class="form-control" id="personas" value="{{$user->personas}}" name="personas" disabled>
					</div>
					<div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<label for="ninos" class="ninos">Niños </label>
						<input type="text" class="form-control" id="ninos" value="{{$user->ninos}}" name="ninos" disabled>
					</div>
					<div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<label for="adultos" class="adultos">Adultos </label>
						<input type="text" class="form-control" id="adultos" value="{{$user->adultos}}" name="adultos" disabled>
					</div>
					<div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<label for="3edad" class="lbl3edad">Personas de la 3era. edad </label>
						<input type="text" class="form-control" id="3edad" value="{{$user->tercera_edad}}" name="3edad" disabled>
					</div>

					<div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<label for="capacidaddiferente" class="capacidaddiferente">Personas con alguna capacidad diferente</label>
						<input type="text" class="form-control" id="capacidaddiferente" value="{{$user->capacidad_diferente}}" name="capacidaddiferente" disabled>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="text-right col-12">
			<a href="{{ route('familias.downloadSnappyPDF') }}" class="btn btn-red">Descargar</a>
			<a href="{{ route('familias.showSnappyPDF') }}" class="btn btn-red">Imprimir</a>
			<a href="{{ route('familias.create') }}" class="btn botonA"></a>
		</div>
		<div class="row">
			@foreach ($familiares as $persona)
				<div class="row ficha">
					<div class="col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 imagenfam">
						<div class="form-row text-center">
							<div class="form-group">
								<div class="tarjetaFoto">
									@if(strpos( $persona->foto_perfil, 'data:image/png;base64,') !==false OR strpos($persona->foto_perfil, 'data:image/jpeg;base64,') !==false)
				                  		<input type="image" name="imagen" id="imagen2" class="tamimg" src="{{ $persona->foto_perfil }}" value="{{ $persona->foto_perfil }}">
				                  		<input type="text" name="imagen" value="{{ $persona->foto_perfil }}" style="display: none">
				                  	@else
				                  		<input type="image" name="imagen" id="imagen2" class="tamig" src="data:image/png;base64,{{ $persona->foto_perfil }}" value="{{ $persona->foto_perfil }}">
				                  		<input type="text" name="imagen" value="{{ $persona->foto_perfil }}" style="display: none;">
				                  	@endif
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-9 col-md-9 col-lg-10 col-xl-10 dtsfam">
						<div class="form-row">
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" value='{{ $persona->nombre }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="apellido_p">Apellido Paterno</label>
								<input type="text" class="form-control" id="apellido_p" name="apellido_p" value='{{ $persona->apellido_p }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="apellido_m">Apellido Materno</label>
								<input type="text" class="form-control" id="apellido_m" name="apellido_m" value='{{ $persona->apellido_m }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="fecha_nacimiento">Fecha de nacimiento</label>
								<input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $persona->f_nac ? date('d-m-Y', strtotime($persona->f_nac)) : 'N/A' }}" disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="edad">Edad</label>
								<input type="text" class="form-control" id="edad" name="edad" value="{{ $persona->f_nac ? $persona->edad : 'N/A' }}" disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="alergias">Alergias</label>
								<input type="text" class="form-control" id="alergias" name="alergias" value='{{ $persona->alergias }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="enfermedades">Enfermedades</label>
								<input type="text" class="form-control" id="enfermedades" name="enfermedades" value='{{ $persona->enfermedades }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="tipo_sanguineo">Tipo Sanguíneo</label>
								<input type="text" class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" value='{{$persona->tipo_sanguineo}}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="tipo_seguro">Tipo de Seguro</label>
								<input type="text" class="form-control" id="tipo_seguro" name="tipo_seguro" value='{{ $persona->tipo_seguro ? $persona->tipo_seguro : '' }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="numero_seguro" class="lblnseguro">Número de Seguro</label>
								<input type="text" class="form-control" id="numero_seguro" name="numero_seguro" value='{{ $persona->numero_seguro }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="discapacidad">Cuenta con alguna discapacidad</label>
								@if($persona->discapacidad==1)
									<input type="text" class="form-control" id="discapacidad" name="discapacidad" value='Si' disabled>
								@else
									<input type="text" class="form-control" id="discapacidad" name="discapacidad" value='No' disabled>
								@endif
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="parentesco" class="lblcualDisc">¿Cuál?</label>
								<input type="text" class="form-control" id="cual" name="cual" value='{{ $persona->tipo_discapacidad }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="nombre_emergencia">En caso de emergencia avisar a:</label>
								<input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" value='{{ $persona->nombre_emergencia }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="parentesco" class="lblparentesco">Parentesco</label>
								<input type="text" class="form-control" id="parentesco" name="parentesco" value='{{ $persona->parentesco_emergencia  }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="telefono" class="lbltelefono">Teléfono</label>
								<input type="text" class="form-control" id="telefono" name="telefono" value='{{ $persona->telefono_emergencia  }}' disabled>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="responsable">Responsable de plan familiar</label>
								<input type="text" class="form-control responsable" id="responsable" name="responsable" value='{{$persona->responsable == true ? 'Si' : 'No'}}' disabled>
							</div>
							<div class="form-group col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center botonera">
								<a href="{{ route('familias.edit',['familia'=>$persona]) }}" class="btn btn-gray">Editar</a>
								<form class="btn" id="delete_{{$persona->id}}" action="{{ route('familias.destroy',['familia'=>$persona]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-red">Eliminar</button>
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
		$("button.btn-red").on('click',function(e){
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