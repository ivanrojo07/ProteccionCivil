@extends('layouts.layout2')
@section('titulo','Familia')
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
			<p>El componente maś importante de tu estrategia son los miembros de tu familia así como tus animales de compañía, por ello es importante que cada uno cuente con su Ficha de Seguridad y la lleve a todos lados</p>
			<p>Complete el siguiente formulario con los datos de aquellos que habitan en tu hogar, agrega tantos familiares y animales de compañía sea necesario.</p>
		</div>
	</div>
	<form class="" method="POST" action="{{ $create ? route('grupos.no_users.store') : route('grupos.no_users.update',['id'=>$none_user['id']])}}" id="formpersona" enctype="multipart/form-data">
		<div class="row ficha">
			@if (!$create)
				@method('PUT')
			@endif
			{{ csrf_field() }}
			<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 imagenfam">
				<div class="form-row">
					<div class="form-group" >
              			<label class="lbl" for="imagen">Foto Opcional</label>
          				<div class="file-field tarjetaFoto">
            				<div class="btn btn-sm float-left botonExplorar">
              					<input class="inputExplorar" id="f1" type="file" accept="image/*" name="image">
              				</div>
            				<div class="file-path-wrapper">
              					<input class="file-path validate inputExplorar2" type="text" placeholder="Explorar en Equipo" style="display:none;">
            				</div>
	              			<input id="ip1" type="text" style="display: none" value="{{$create ? (old('imagen') ? old('imagen') : '') : ($none_user['avatar64'] ? $none_user['avatar64'] : '')}}" name="imagen">
	              			<input id="ip" type="image" style="{{$create ? (old('imagen') ? 'width: 100%; height: 85%;' : 'display: none') : ($none_user['avatar64'] ? 'width: 100%; height: 85%;' : 'display: none')}}" src="{{$create ? (old('imagen') ? old('imagen') : '') : ($none_user['avatar64'] ? $none_user['avatar64'] : '')}}">
          				</div>
              		</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre" class="">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{$create ? old('nombre') : $none_user['nombre']}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="apellido_p" class="">Apellido Paterno</label>
						<input type="text" class="form-control" id="apellido_p" name="apellido_p" value="{{$create ? old('apellido_p') : $none_user['paterno']}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="apellido_m" class="">Apellido Materno</label>
						<input type="text" class="form-control" id="apellido_m" name="apellido_m" value="{{$create ? old('apellido_m') : $none_user['materno']}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tel_movil">Telefono movil</label>
						<input type="text" id="tel_movil" name="tel_movil" pattern="[0-9]{8,10}" title="8 a 10 digitos numericos" value="{{$create ? old('tel_movil') : $none_user['telefono_movil']}}" class="form-control">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tel_hogar">Telefono del hogar</label>
						<input type="text" id="tel_hogar" name="tel_hogar" pattern="[0-9]{8,10}" value="{{ $create ? old('tel_hogar') : $none_user['telefono_hogar'] }}" title="8 a 10 digitos numericos" class="form-control">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="genero">Genero</label>
						<select name="genero" id="genero" class="form-control tipo_sanguineo_Select">
							<option value="" >Seleccione una opción</option>
							@foreach ($generos as $genero)
								<option value="{{$genero}}" {{$create ? (old('genero') == $genero ? 'selected' :'') : ($none_user['genero'] == $genero ? 'selected' : '')}}>{{$genero}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="codigoPostal">Código Postal</label>
						<input type="text" class="form-control" id="codigoPostal" name="codigo_postal" pattern="[0-9]{5}" value="{{$create || old('codigo_postal') ? old('codigo_postal') : $none_user['codigo_postal']}}" title="5 digitos numericos">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="colonia">Colonia</label>
						<select class="form-control" id="colonia" name="colonia">
							@if (old('colonia'))
								<option value="{{old('colonia')}}">{{old('colonia')}}</option>
							@elseif(!$create)
								<option value="{{$direccion[3]}}">{{$direccion[3]}}</option>
							@else
								<option value="">Seleccione una localidad</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="alcaldia">Alcaldía</label>
						<select class="form-control" id="alcaldia" name="alcaldia">
							@if (old('alcaldia'))
								<option value="{{old('alcaldia')}}">{{old('alcaldia')}}</option>
							@elseif(!$create)
								<option value="{{$direccion[4]}}">{{$direccion[4]}}</option>
							@else
								<option value="">Seleccione una alcaldía o municipio</option>
							@endif
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="estado">Estado</label>
						<select class="form-control" id="estado" name="estado">
							@if (old('estado'))
								<option value="{{old('estado')}}">{{old('estado')}}</option>
							@elseif(!$create)
								<option value="{{$direccion[5]}}">{{$direccion[5]}}</option>
							@else
								<option value="">Seleccione un estado o ciudad</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="calle" class="">Calle</label>
						<input type="text" name="calle" class="form-control" value="{{$create ? old('calle') : $direccion[0]}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_ext" class="">Numero exterior</label>
						<input type="text" name="numero_ext" class="form-control" value="{{$create ? old('numero_ext') : $direccion[1]}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_int" class="">Numero interior</label>
						<input type="text" name="numero_int" class="form-control" value="{{$create ? old('numero_int') : $direccion[2]}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="edad" class="">Fecha de nacimiento</label>
						<input type="date" id="datepicker" name="edad" class="form-control" value="{{$create ? old('edad') : $none_user['fechadenacimiento']}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="alergias" class="">Alergias</label>
						<input type="text" class="form-control" id="alergias" name="alergias" value="{{$create ? old('alergias') : $none_user['alergias']}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="enfermedades">Enfermedades</label>
						<input type="text" class="form-control" id="enfermedades" name="enfermedades" value="{{$create ? old('enfermedades') : $none_user['condicion_medica']}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tipo_sanguineo">Tipo Sanguíneo</label>
						<select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">
							<option value="">Tipo de sangre</option>
							@foreach ($tipo_sangre as $sangre)
								<option value="{{$sangre->name}}" {{$create ? (old('tipo_sanguineo') == $sangre->name ? 'selected' :'') : ($none_user['rh'] == $sangre->name ? 'selected' : '')}}>{{$sangre->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_seguro">Número de Seguro</label>
						<input type="text" class="form-control" id="numero_seguro" name="numero_seguro" value="{{$create ? old('numero_seguro') : $none_user['numero_seguro']}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="tipo_seguro">Tipo de Seguro</label>
						<select id="tipo_seguro" name="tipo_seguro" class="form-control">
							<option value="">Seleccione una opción</option>
							@foreach ($tipo_seguros as $seguro)
								<option value="{{$seguro->nombre}}" {{$create ? (isset($seguro) && old('tipo_seguro') == $seguro->nombre ? 'selected' :'') : (isset($none_user['tipo_seguro']) && $none_user['tipo_seguro'] == $seguro->nombre ? 'selected' : '')}}>{{$seguro->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre_emergencia">En caso de emergencia avisar a:</label>
						<input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" value="{{$create ? old('nombre_emergencia') : $none_user['emergencia_contacto']}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="parentesco">Parentesco</label>
						<select class="form-control" id="parentesco" name="parentesco">
							<option value="">Seleccione una opción</option>
							@foreach ($parentesco as $pariente)
								<option value="{{$pariente->name}}" {{$create ? (old('parentesco') == $pariente->name ? 'selected' :'') : ($none_user['parentesco_contacto'] == $pariente->name ? 'selected' : '')}}>{{$pariente->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="telefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]{8,10}" title="8 a 10 digitos numericos" value="{{$create ? old('telefono') : $none_user['telefono_contacto']}}">
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="discapacidad">Cuenta con alguna discapacidad</label>
						<select name="discapacidad" id="discapacidad" class="form-control">
							<option value="1" {{$create ? (old('discapacidad') == 1 ? 'selected=""' : '' ) : ($none_user['discapacidad'] == "true" ? 'selected=""' : '')}}>Si</option>
							<option value="0" {{$create ? (old('discapacidad') == 0 ? 'selected=""' : '' ) : ($none_user['discapacidad'] == "false" ? 'selected=""' : '')}}>No</option>
						</select>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<label for="cual">¿Cuál?</label>
						<input type="text" class="form-control" id="cual" name="cual" value="{{$create ? old('cual') : $none_user['tipo_discapacidad']}}">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 text-center botonera">
						<a href="{{route('grupos.index')}}" class="btn btn-gray"  {{--onclick="limpiar()"--}}>Cancelar</a>
						<button id="submitForm" type="submit" class="btn btn-red botondireccion">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection


@section('scripts')
<script type="text/javascript">

  $(document).ready(function() {
    $("#f1").on('change',function(event) {
      $("#nuevo").remove();
    });
  });
</script>
<script type="text/javascript">
  $('#f1').on('change', function(ev) {
    var f1 = ev.target.files[0];
    var fr = new FileReader();

    fr.onload = function(ev2) {

        var input2 = document.getElementById('ip');

        input2.style="width: 131px;height: 145px;display:block;padding:0%;margin-top:-130px;";


        $('#ip').attr('src', ev2.target.result);

        $('#ip1').attr('value',ev2.target.result);
        $('#ip1').attr('name','imagen');


    };

    fr.readAsDataURL(f1);

});

</script>
<script type="text/javascript">
	function limpiar(){
		document.getElementById("formpersona").reset();

	}
</script>
<script type="text/javascript">
	{{-- Boton lanza modal para confirmar --}}
	$("#submitForm").click(function(){
		$("#modalConfirm").modal('show');
	});
	$("#formpersona").submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de guardar este registro en tu Plan Familiar?',
			text: "¡Este registro estaría actualizado con protección civil!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			confirmButtonText: '¡Aceptar!',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
		    this.submit();
		  }
		});
	});
	// Boton de confirmación
	$("#btn-confirmar-submit").click(function() {
		$("#formpersona").submit();
	});
	$("#gridCheck").change(function () {
		if($("#gridCheck").is(':checked')){
			Swal.fire({
				title: '¿Estas seguro de asignar responsable del Plan Familiar?',
				text: "¡Este familiar seria el nuevo responsable del Plan Familiar!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				confirmButtonText: '¡Aceptar!',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
			  if (!result.value) {
			  	$("#gridCheck").prop('checked', false);
			    Swal.fire(
			   		'¡Cancelado!',
			    	'Se cancelo la acción',
			    	'success'
			    )
			  }
			});
		}
	});
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
	@if (old('codigo_postal'))
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
					$("#colonia").val("{{$create || old('colonia') ? old('colonia') : $direccion[3]}}");

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
					$("#alcaldia").val("{{$create || old('alcaldia') ? old('alcaldia') : $direccion[4]}}");

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
					$("#estado").val("{{$create || old('estado') ? old('estado') : $direccion[5]}}");


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
	@if ($errors->any())
		Swal.fire({
			title:'Error',
			type:'error',
			html:`<ul>
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			    </ul>`,
			showCloseButton: true,
  			showCancelButton: true,
		});
	@endif	
</script>
@endsection