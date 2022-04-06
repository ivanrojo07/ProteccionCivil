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
			<form method="POST" action="{{ route('submit_registro') }}" id="form_registro">
				{{ csrf_field() }}				
				<div class="form-row dtsdir">
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="calle">Calle</label>
						<input type="text" class="form-control" id="calle" name="calle" value="{{old('calle')}}">
					</div>
					<div class="form-group col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2">
						<label for="numeroExt">Número Exterior</label>
						<input type="text" class="form-control" id="numeroExt" name="numeroExt" value="{{old('numeroExt')}}">
					</div>
					<div class="form-group col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2">
						<label for="numeroInt">Número Interior</label>
						<input type="text" class="form-control" id="numeroInt" name="numeroInt" value="{{old('numeroInt')}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="calle">C.P.</label>
						<input type="text" class="form-control CP" id="codigoPostal" name="codigoPostal" value="{{old('codigoPostal') ? old('codigoPostal') : (session()->get('info') ? session()->get('info')->codigopostal : '')}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="colonia">Colonia</label>
						<select class="form-control" id="colonia" name="colonia">
							@if (old('colonia'))
								<option value="{{old('colonia')}}">{{old('colonia')}}</option>
							@else
								<option value="">Seleccione una localidad</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="alcaldia">Alcaldía o Municipio</label>
						<select class="form-control" id="alcaldia" name="alcaldia">
							@if (old('alcaldia'))
								<option value="{{old('alcaldia')}}">{{old('alcaldia')}}</option>
							@else
								<option value="">Seleccione una alcaldía o municipio</option>
							@endif
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="estado">Estado</label>
						<select class="form-control" id="estado" name="estado">
							@if (old('estado'))
								<option value="{{old('estado')}}">{{old('estado')}}</option>
							@else
								<option value="">Seleccione un estado o ciudad</option>
							@endif
						</select>
					</div>					
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_pisos" class="pisoslbl">Número de Pisos en su Hogar</label>
						<input type="number" min="0" class="form-control pisos" id="numero_pisos" name="numero_pisos" value="{{old('numero_pisos')}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="riesgo" class="">¿Considera que su hogar se encuentra en una zona de riesgo?</label>
						<select class="form-control" id="riesgo" name="riesgo">
							<option value="">Seleccione una opción</option>
							@foreach ($riesgos as $riesgo)
								<option value="{{$riesgo->name}}" {{old('riesgo') == $riesgo->name ? 'selected' :''}}>{{$riesgo->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row ficha">
					<div class="form-group col-12 checkResp">
						<div class="col-12 col-md-8 offset-md-3 col-sm-8 offset-sm-3 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
							<input class="form-check-input" type="checkbox" name="responsable" {{old('responsable') ? 'checked' :''}} id="gridCheck">
							<label class="form-check-label" for="gridCheck">Responsable del Plan Familiar</label>
						</div>
					</div>
					<div class="col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 imagenfam">
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
		                  			<input id="ip1" type="text" style="display: none" name="imagen">
		                  			<input id="ip" type="image" style="display: none" src="">
	                  			</div>
	                  		</div>
						</div>
					</div>
					<div class="col-12 col-sm-9 col-md-9 col-lg-10 col-xl-10 dtsfam">
						<div class="form-row">
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="nombre" class="">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre') ? old('nombre') : (session()->get('info') ? session()->get('info')->name : '')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="apellido_p" class="">Apellido Paterno</label>
								<input type="text" class="form-control" id="apellido_p" name="apellido_p" value="{{old('apellido_p') ? old('apellido_p') : (session()->get('info') ? session()->get('info')->apellido_paterno : '')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="apellido_m" class="">Apellido Materno</label>
								<input type="text" class="form-control" id="apellido_m" name="apellido_m" value="{{old('apellido_m') ? old('apellido_m') : (session()->get('info') ? session()->get('info')->apellido_materno : '')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="edad" class="">Fecha de nacimiento</label>
								<input class="form-control" type="date" id="datepicker" name="edad" value="{{old('edad') ? old('edad') : (session()->get('info') ? session()->get('info')->fecha_nacimiento : '')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="genero">Genero</label>
								<!--<input type="text" class="form-control" id="genero" name="genero">-->
								<select name="genero" id="genero" class="form-control">
									<option value="" >Seleccione una opción</option>
									@foreach ($generos as $genero)
										<option value="{{$genero}}" {{old('genero') == $genero ? 'selected' :''}}>{{$genero}}</option>
									@endforeach
								</select>
							</div>							
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="alergias" class="">Alergias</label>
								<input type="text" class="form-control" id="alergias" name="alergias" value="{{old('alergias') ? old('alergias') : (session()->get('info') ? session()->get('info')->alergia : '')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="enfermedades">Enfermedades</label>
								<input type="text" class="form-control" id="enfermedades" name="enfermedades" value="{{old('enfermedades')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="tipo_sanguineo">Tipo Sanguíneo</label>
								<!--<input type="text" class="form-control" id="tipo_sanguineo" name="tipo_sanguineo">-->
								<select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">
									<option value="">Tipo de sangre</option>
									@foreach ($tipo_sangre as $sangre)
										<option value="{{$sangre->name}}" {{old('tipo_sanguineo') == $sangre->name ? 'selected' :''}}>{{$sangre->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="tipo_seguro">Tipo de Seguro</label>
								<select id="tipo_seguro" name="tipo_seguro" class="form-control">
									<option value="">Seleccione una opción</option>
									@foreach ($tipo_seguros as $seguro)
										<option value="{{$seguro->nombre}}" {{old('tipo_seguro') == $seguro->nombre ? 'selected' :''}}>{{$seguro->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="numero_seguro" class="lblnseguro">Número de Seguro</label>
								<input type="text" class="form-control" id="numero_seguro" name="numero_seguro" value="{{old('numero_seguro')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="discapacidad">Cuenta con alguna discapacidad</label>
								<select name="discapacidad" id="discapacidad" class="form-control">
									<option value="1" {{old('discapacidad') == 1 ? 'selected' :''}}>Si</option>
									<option value="0" {{old('discapacidad') == 0 ? 'selected' :''}}>No</option>
								</select>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="cual" class="lblcualDisc">¿Cuál?</label>
								<input type="text" class="form-control" id="cual" name="cual" value="{{old('cual')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="nombre_emergencia">En caso de emergencia avisar a</label>
								<input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" value="{{old('nombre_emergencia')}}">
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="parentesco" class="lblparentesco">Parentesco</label>
								<select class="form-control" id="parentesco" name="parentesco">
									<option value="">Seleccione una opción</option>
									@foreach ($parentesco as $pariente)
										<option value="{{$pariente->name}}" {{old('parentesco') == $pariente->name ? 'selected' :''}}>{{$pariente->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<label for="telefono" class="lbltelefono">Teléfono</label>
								<input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono') ? old('telefono') : (session()->get('info') ? session()->get('info')->telefono_emergencia : '')}}">
							</div>
							<div class="form-group col-12 text-center botonera">
								<button type="button" class="btn btn-gray"  onclick="limpiar()">Cancelar</button>
								<button type="submit" id="submitForm" class="btn btn-red">Guardar</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
		$("#form_registro").submit(function(e){
		e.preventDefault();
		Swal.fire({
		  title: '¿Deseas guardar el registro?',
		  text: "¡Este registro estará conectado con Protección Civil!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '¡Aceptar!',
		  cancelButtonText: '¡Cancelar!'
		}).then((result) => {
		  if (result.value) {
		    Swal.fire(
		      '¡Actualizando!',
		      'Tu registro está siendo actualizado.',
		      'success'
		    );
		    this.submit();
		  }
		})
	})
	  $(document).ready(function() {
	    $("#f1").on('change',function(event) {
	      //alert("Funcion FFFFFFFFFFFFFFFFf111111111111111");
	      $("#nuevo").remove();
	    });
	    /*$("#boton02").click(function(event) {
	      $("#boton02").remove();
	    });
	    $("#boton03").click(function(event) {
	      $(".boton03").remove();
	    });
	        $("#boton04").click(function(event) {
	      $("p").remove(".borrame");
	    });*/
	  });
</script>
<script type="text/javascript">
  $('#f1').on('change', function(ev) {
    //alert("Funcion FFFFFFFFFFFFFFFFffffffffffff");
    var f1 = ev.target.files[0];
    var fr = new FileReader();

    fr.onload = function(ev2) {
        //console.dir(ev2);

        var input2 = document.getElementById('ip');

        input2.style="width: 100%;height: 85%;";

        //input2.src = "ev2.target.result"

        $('#ip').attr('src', ev2.target.result);

        $('#ip1').attr('value',ev2.target.result);
        $('#ip1').attr('name','imagen');


        //console.log(ev2.target.result);
    };

    fr.readAsDataURL(f1);

});

</script>
<script type="text/javascript">
	function limpiar(){
		document.getElementById("form_registro").reset();

	}
</script>
<script type="text/javascript">
	{{-- Boton lanza modal para confirmar --}}
	$("#submitForm").click(function(){
		$("#modalConfirm").modal('show');
	});
	// Boton de confirmación
	$("#btn-confirmar-submit").click(function() {
		$("#form_registro").submit();
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
	})
</script>
@endsection