@extends('layouts.layout2')
@section('titulo','Datos Generales')
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
			<h3>Mi Familia</h3>
			<hr>
			<p>El componente más importante de tu estrategia son los miembros de tu familia así como tus animales de compañia, por ello es importante que cada uno cuente con su Ficha de Seguridad y la lleve a todos lados.</p>
			<p>Complete el siguiente formulario con los datos de aquellos que habitan en tu hogar, agrega tantos familiares y animales de compañia sea necesario.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-12 titulo2">
			<h3>Datos Generales</h3>
			<hr>
			<h4>Dirección:</h4>
		</div>
		<div class="formulario col-12">	
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form method="POST" action="{{ route($create ? 'dato_general.create': 'dato_general.update') }}" id="dato_general">
				{{ csrf_field() }}
				@if (!$create)
					@method('PUT')
				@endif
				<div class="form-row dtsdir">
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="calle">Calle</label>
						<input type="text" class="form-control" id="calle" value="{{$create ? old('calle') : $dato_general->calle}}" name="calle">
					</div>
					<div class="form-group col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2">
						<label for="numeroExt">Número Exterior</label>
						<input type="text" class="form-control" id="numeroExt" value="{{$create ? old('numeroExt') : $dato_general->numero_exterior}}" name="numeroExt">
					</div>
					<div class="form-group col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2">
						<label for="numeroInt">Número Interior</label>
						<input type="text" class="form-control" id="numeroInt" value="{{$create ? old('numeroInt') : $dato_general->numero_interior}}" name="numeroInt">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="codigoPostal">C.P.</label>
						<input type="text" class="form-control CP" id="codigoPostal" value="{{$create ? old('codigoPostal') : $dato_general->codigo_postal}}" name="codigoPostal">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="colonia">Colonia</label>
						<select class="form-control" id="colonia" name="colonia">
							@if ($create && old('colonia'))
								<option value="{{old('colonia')}}">{{old('colonia')}}</option>
							@elseif (!$create && $dato_general->colonia)
								<option value="{{$dato_general->colonia}}">{{$dato_general->colonia}}</option>
							@else
								<option value="">Seleccione una localidad</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="alcaldia">Alcaldía o Municipio</label>
						<select class="form-control" id="alcaldia" name="alcaldia">
							@if ($create && old('alcaldia'))
								<option value="{{old('alcaldia')}}">{{old('alcaldia')}}</option>
							@elseif (!$create && $dato_general->alcaldia)
								<option value="{{$dato_general->alcaldia}}">{{$dato_general->alcaldia}}</option>
							@else
								<option value="">Seleccione una alcaldía o municipio</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="estado">Estado</label>
						<select class="form-control" id="estado" name="estado">
							@if ($create && old('estado'))
								<option value="{{old('estado')}}">{{old('estado')}}</option>
							@elseif (!$create && $dato_general->estado)
								<option value="{{$dato_general->estado}}">{{$dato_general->estado}}</option>
							@else
								<option value="">Seleccione un estado o ciudad</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_pisos" class="pisoslbl">Número de Pisos en su Hogar</label>
						<input type="number" min="0" class="form-control pisos" id="numero_pisos" value="{{$create ? old('numero_pisos') : $dato_general->pisos_hogar}}" name="numero_pisos">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="riesgo" class="">¿Considera que su hogar se encuentra en una zona de riesgo?</label>
						<select class="form-control" id="riesgo" name="riesgo">
							<option value="">Seleccione una opción</option>
							<option value="Alto" {{$create ? '' : ($dato_general->zona_riesgo == "Alto" ? 'selected=""' : '')}}>Alto</option>
							<option value="Medio" {{$create ? '' : ($dato_general->zona_riesgo == "Medio" ? 'selected=""' : '')}}>Medio</option>
							<option value="Bajo" {{$create ? '' : ($dato_general->zona_riesgo == "Bajo" ? 'selected=""' : '')}}>Bajo</option>
						</select>
					</div>
				</div>
				<div class="form-group col-12 text-center botonera">
					<button type="submit" id="submitForm" class="btn btn-red">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
@section('scripts')
	<script type="text/javascript">
		{{-- Boton lanza modal para confirmar --}}
		$("#dato_general").submit(function(e){
			e.preventDefault();
			Swal.fire({
			  title: '¿Deseas guardar el registro?',
			  text: "¡Este registro estara estan conectados con Protección Civil!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: '¡Aceptar!',
			  cancelButtonText: '¡Cancelar!'
			}).then((result) => {
			  if (result.value) {
			    this.submit();
			  }
			})
		})
	</script>
	<script type="text/javascript">
		// CONSUMO DE API CODIGO POSTAL
		$("#codigoPostal").change(function() {
			var cp = $("#codigoPostal").val();
			var url = `{{ url('api/cp/') }}/${cp}`;
			$.ajax({
				url:url, 
				success:function(result){
					var localidad = result.localidad;
					// set info de asentamiento/colonía
					var options_asentamiento = '';
					$("#colonia").empty();
					// si hay más de un asentamiento
					if(localidad.asentamiento instanceof Array){
						options_asentamiento="<option value=''>Seleccione una localidad</option>";
						for (var i = localidad.asentamiento.length - 1; i >= 0; i--) {
							options_asentamiento +=`<option value="${localidad.asentamiento[i]}">${localidad.asentamiento[i]}</option>`;
						}
					}
					else{
						options_asentamiento +=`<option value="${localidad.asentamiento}">${localidad.asentamiento}</option>`;
					}
					$("#colonia").append(options_asentamiento);

					// set info de alcaldia/municipio
					$("#alcaldia").empty();
					var options_municipio="";
					// si hay más de una alcaldia
					if(localidad.municipio instanceof Array){
						options_municipio="<option value=''>Seleccione una alcaldía o municipio</option>";
						for (var i = localidad.municipio.length - 1; i >= 0; i--) {
							options_municipio +=`<option value="${localidad.municipio[i]}">${localidad.municipio[i]}</option>`;
						}
					}
					else{
						options_municipio +=`<option value="${localidad.municipio}">${localidad.municipio}</option>`;
					}
					$("#alcaldia").append(options_municipio);

					// set info de estado/ciudad
					$("#estado").empty();
					var options_estado="";
					// si hay más de una estado
					if(localidad.estado instanceof Array){
						options_estado="<option value=''>Seleccione un estado o ciudad</option>";
						for (var i = localidad.estado.length - 1; i >= 0; i--) {
							options_estado +=`<option value="${localidad.estado[i]}">${localidad.estado[i]}</option>`;
						}
					}
					else{
						options_estado +=`<option value="${localidad.estado}">${localidad.estado}</option>`;
					}
					$("#estado").append(options_estado);


				},
				error: function(xhr,status,error){
					err = JSON.parse(xhr.responseText);
					console.log(err);
					Swal.fire({
					  type: 'error',
					  title: 'Error',
					  text: err.error
					});
				}
			});
		});
		// SI HAY REGISTRO DE CODIGO POSTAL LANZA DIRECTAMENTE LA BUSQUEDA AL CARGAR PAGINA
		@if (old('codigoPostal') || !$create)
			$(document).ready(function () {
				var cp = $("#codigoPostal").val();
				var url = `{{ url('api/cp/') }}/${cp}`;
				$.ajax({
					url:url, 
					success:function(result){
						var localidad = result.localidad;
						// set info de asentamiento/colonía
						var options_asentamiento = '';
						$("#colonia").empty();
						// si hay más de un asentamiento
						if(localidad.asentamiento instanceof Array){
							options_asentamiento="<option value=''>Seleccione una localidad</option>";
							for (var i = localidad.asentamiento.length - 1; i >= 0; i--) {
								options_asentamiento +=`<option value="${localidad.asentamiento[i]}">${localidad.asentamiento[i]}</option>`;
							}
						}
						else{
							options_asentamiento +=`<option value="${localidad.asentamiento}">${localidad.asentamiento}</option>`;
						}
						$("#colonia").append(options_asentamiento);
						// Seleccionamos el valor anterior del formulario
						$("#colonia").val("{{$create || old('colonia') ? old('colonia') : $dato_general->colonia}}");

						// set info de alcaldia/municipio
						$("#alcaldia").empty();
						var options_municipio="";
						// si hay más de una alcaldia
						if(localidad.municipio instanceof Array){
							options_municipio="<option value=''>Seleccione una alcaldía o municipio</option>";
							for (var i = localidad.municipio.length - 1; i >= 0; i--) {
								options_municipio +=`<option value="${localidad.municipio[i]}">${localidad.municipio[i]}</option>`;
							}
						}
						else{
							options_municipio +=`<option value="${localidad.municipio}">${localidad.municipio}</option>`;
						}
						$("#alcaldia").append(options_municipio);
						// Seleccionamos el valor anterior del formulario
						$("#alcaldia").val("{{$create || old('alcaldia') ? old('alcaldia') : $dato_general->alcaldia}}");

						// set info de estado/ciudad
						$("#estado").empty();
						var options_estado="";
						// si hay más de una estado
						if(localidad.estado instanceof Array){
							options_estado="<option value=''>Seleccione un estado o ciudad</option>";
							for (var i = localidad.estado.length - 1; i >= 0; i--) {
								options_estado +=`<option value="${localidad.estado[i]}">${localidad.estado[i]}</option>`;
							}
						}
						else{
							options_estado +=`<option value="${localidad.estado}">${localidad.estado}</option>`;
						}
						$("#estado").append(options_estado);
						// Seleccionamos el valor anterior del formulario
						$("#estado").val("{{$create || old('estado') ? old('estado') : $dato_general->estado}}");
					},
					error: function(xhr,status,error){
						err = JSON.parse(xhr.responseText);
						console.log(err);
						Swal.fire({
						  type: 'error',
						  title: 'Error',
						  text: err.error
						});
					}
				});
			});
		@endif
	</script>
@endsection