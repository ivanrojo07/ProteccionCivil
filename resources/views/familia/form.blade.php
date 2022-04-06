@extends('layouts.layout2')
@section('titulo','Familia')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('menu')
    <div class="row"  style="display: none;">
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
	<div class="row">
		<div class="col-12 titulo2">
			<h3>Datos Generales</h3>
			<hr>
			<h4>Dirección:</h4>
		</div>
		<div class="formulario col-12">			
			<div class="form-row dtsdir">
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="calle">Calle</label>
					<input type="text" class="form-control" id="calle" value="{{ $dato_general->calle }}" name="calle" disabled>
				</div>
				<div class="form-group col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2">
					<label for="numeroExt">Número Exterior</label>
					<input type="text" class="form-control" id="numeroExt" value="{{ $dato_general->numero_exterior }}" name="numeroExt" disabled>
				</div>
				<div class="form-group col-6 col-sm-3 col-md-2 col-lg-2 col-xl-2">
					<label for="numeroInt">Número Interior</label>
					<input type="text" class="form-control" id="numeroInt" value="{{ $dato_general->numero_interior }}" name="numeroInt" disabled>
				</div>
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="codigoPostal" class="lbl">C.P.</label>
					<input type="text" class="form-control" id="codigoPostal" value="{{ $dato_general->codigo_postal }}" name="codigoPostal" disabled>
				</div>
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="colonia">Colonia</label>
					<input type="text" class="form-control" id="colonia" value="{{ $dato_general->colonia }}" name="colonia" disabled>
				</div>
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="alcaldia">Alcaldía o Municipio</label>
					<input type="text" class="form-control" id="alcaldia" value="{{ $dato_general->alcaldia }}" name="alcaldia" disabled>
				</div>
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="estado">Estado</label>
					<input type="text" class="form-control" id="estado" value="{{ $dato_general->estado }}" name="estado" disabled>
				</div>
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="numero_pisos" class="pisoslbl">Número de Pisos en su Hogar</label>
					<input type="text" class="form-control" id="numero_pisos" value="{{ $dato_general->pisos_hogar }}" name="numero_pisos" disabled>
				</div>
				<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<label for="riesgo" class="">¿Considera que su hogar se encuentra en una zona de riesgo?</label>
					<input type="text" class="form-control" id="riesgo" value="{{ $dato_general->zona_riesgo }}" name="riesgo" disabled>
				</div>
			</div>
			<div class="col-12 text-right">
				<a href="{{route('dato_general.edit')}}" class="btn btn-gray">Editar</a>
			</div>
		</div>
	</div>
	<form class="" method="POST" action="{{ $create ? route('familias.store') : route('familias.update',['familia'=>$familia])}}" id="formpersona" enctype="multipart/form-data">
		<div class="row ficha">
			@if (!$create)
				@method('PUT')
			@endif
			{{ csrf_field() }}
			<div class="form-group col-12 checkResp">
				<div class="col-12 col-md-8 offset-md-3 col-sm-8 offset-sm-3 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
					<input class="form-check-input" type="checkbox" name="responsable" {{$create ? '' : ($familia->responsable ? "checked=''" : '')}} id="gridCheck">
					<label class="form-check-label" for="gridCheck">Responsable del Plan Familiar</label>
				</div>
			</div>
			<div class="col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 imagenfam">
				<div class="form-row">
					<div class="form-group">
              			<label class="lbl" for="imagen">Foto Opcional</label>
          				<div class="file-field tarjetaFoto">
            				<div class="btn btn-sm float-left botonExplorar">
              					<input class="inputExplorar" id="f1" type="file" accept="image/*" name="image">
              				</div>
            				<div class="file-path-wrapper" style="width: 100%;height: 100%;">
              					<input class="file-path validate inputExplorar2" type="text" placeholder="Explorar en Equipo" style="display:none;">
	              				<input id="ip1" type="text" style="display: none" value="{{$create ? (old('imagen') ? old('imagen') : '') : ($familia->foto_perfil ? $familia->foto_perfil : '')}}" name="imagen">
	              				<input id="ip" type="image" style="{{$create ? (old('imagen') ? 'width: 100%; height: 85%;' : 'display: none') : ($familia->foto_perfil ? 'width: 100%; height: 85%;' : 'display: none')}}" src="{{$create ? (old('imagen') ? old('imagen') : '') : ($familia->foto_perfil ? $familia->foto_perfil : '')}}">
            				</div>
          				</div>
              		</div>
				</div>
			</div>
			<div class="col-12 col-sm-9 col-md-9 col-lg-10 col-xl-10 dtsfam">
				<div class="form-row">
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre" class="">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{$create ? '' : $familia->nombre}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="apellido_p" class="">Apellido Paterno</label>
						<input type="text" class="form-control" id="apellido_p" name="apellido_p" value="{{$create ? '' : $familia->apellido_p}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="apellido_m" class="">Apellido Materno</label>
						<input type="text" class="form-control" id="apellido_m" name="apellido_m" value="{{$create ? '' : $familia->apellido_m}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="edad" class="">Fecha de nacimiento</label>
						<input class="form-control" type="date" id="datepicker" name="edad" value="{{$create ? '' : $familia->f_nac}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="genero">Genero</label>
						<select name="genero" id="genero" class="form-control">
							<option value="" >Seleccione una opción</option>
							@foreach ($generos as $genero)
								<option value="{{$genero}}" {{$create ? (old('genero') == $genero ? 'selected' :'') : ($familia->genero == $genero ? 'selected' : '')}}>{{$genero}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="alergias" class="">Alergias</label>
						<input type="text" class="form-control" id="alergias" name="alergias" value="{{$create ? '' : $familia->alergias}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="enfermedades">Enfermedades</label>
						<input type="text" class="form-control" id="enfermedades" name="enfermedades" value="{{$create ? '' : $familia->enfermedades}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="tipo_sanguineo">Tipo Sanguíneo</label>
						<!--<input type="text" class="form-control" id="tipo_sanguineo" name="tipo_sanguineo">-->
						<select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">
							<option value="">Tipo de sangre</option>
							@foreach ($tipo_sangre as $sangre)
								<option value="{{$sangre->name}}" {{$create ? (old('tipo_sanguineo') == $sangre->name ? 'selected' :'') : ($familia->tipo_sanguineo == $sangre->name ? 'selected' : '')}}>{{$sangre->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="tipo_seguro">Tipo de Seguro</label>
						<select id="tipo_seguro" name="tipo_seguro" class="form-control">
							<option value="">Seleccione una opción</option>
							@foreach ($tipo_seguros as $seguro)
								<option value="{{$seguro->nombre}}" {{$create ? (isset($seguro) && old('tipo_seguro') == $seguro->nombre ? 'selected' :'') : (isset($familia->tipo_seguro) && $familia->tipo_seguro == $seguro->nombre ? 'selected' : '')}}>{{$seguro->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_seguro" class="lblnseguro">Número de Seguro</label>
						<input type="text" class="form-control" id="numero_seguro" name="numero_seguro" value="{{$create ? '' : $familia->numero_seguro}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="discapacidad">Cuenta con alguna discapacidad</label>
						<select name="discapacidad" id="discapacidad" class="form-control">
							<option value="1" {{$create ? '' : ($familia->discapacidad ? 'selected=""' : '')}}>Si</option>
							<option value="0" {{$create ? '' : ($familia->discapacidad == 0 ? 'selected=""' : '')}}>No</option>
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="cual" class="lblcualDisc">¿Cuál?</label>
						<input type="text" class="form-control" id="cual" name="cual" value="{{$create ? '' : $familia->tipo_discapacidad}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre_emergencia">En caso de emergencia avisar a:</label>
						<input type="text" class="form-control" id="nombre_emergencia" name="nombre_emergencia" value="{{$create ? '' : $familia->nombre_emergencia}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="parentesco" class="lblparentesco">Parentesco</label>
						<select class="form-control" id="parentesco" name="parentesco">
							<option value="">Seleccione una opción</option>
							@foreach ($parentesco as $pariente)
								<option value="{{$pariente->name}}" {{$create ? (old('parentesco') == $pariente->name ? 'selected' :'') : ($familia->parentesco_emergencia == $pariente->name ? 'selected' : '')}}>{{$pariente->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="telefono" class="lbltelefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" name="telefono" value="{{$create ? '' : $familia->telefono_emergencia}}">
					</div>
					<div class="form-group col-12 text-center botonera">
						<a href="{{route('dashboard')}}" class="btn btn-gray"  {{--onclick="limpiar()"--}}>Cancelar</a>
						<button type="submit" id="submitForm" class="btn btn-red botondireccion">Guardar</button>
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

        input2.style="width: 100%;height: 85%;";


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
	$("#formpersona").submit(function(e){
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
	});
	/*Alerta para confirmar si este usuario sera el responsable familiar*/
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

</script>
@endsection