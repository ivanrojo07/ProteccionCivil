@extends('layouts.layout2')
@section('titulo','Mascotas')
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
			<h3>Mis Animales de Compañía</h3>
			<hr>
			<p>El componente más importante de tu estrategia son los miembros de tu familia y también tus animales de compañía, por ello es importante que cada uno cuente con su Ficha de Seguridad.</p>
			<p>Complete el siguiente formulario con los datos de las mascotas que habitan en tu hogar, agrega tantos sean necesarios.</p>
		</div>
	</div>
	<br>
	<div class="text-right col-12">
		<button class="btn btn-red">Descargar</button>
		<button class="btn btn-red">Imprimir</button>
		{{--<button class="btn botonA"></button>--}}
	</div>
	<form class="formularioMascota" method="POST" action="{{ $create ? route('mascotas.store') : route('mascotas.update',['mascota'=>$mascota])}}" id="formmascota" enctype="multipart/form-data">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			    </ul>
			</div>
		@endif
		<div class="row ficha">
			{{ csrf_field() }}
			@if (!$create)
				@method('PUT')
			@endif
			<div class="col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 imagenmasc">
				<div class="form-row">
					<div class="form-group" >
                  		<label class="lbl" for="imagen">Foto Opcional</label>
              			<div class="file-field tarjetaFoto">
                			<div class="btn btn-sm float-left botonExplorar">
                  				<!--<span>Explorar</span>-->
                  				<input class="inputExplorar" id="f1" type="file" accept="image/*" name="image">
                  			</div>
                			<div class="file-path-wrapper" style="width: 100%;height: 100%;">
                  				<input class="file-path validate inputExplorar2" type="text" placeholder="Explorar en Equipo" style="display:none;">
		                  		<input id="ip1" type="text" style="display: none" value="{{$create ? (old('imagen') ? old('imagen') : '') : ($mascota->foto_mascota ? $mascota->foto_mascota : '')}}" name="imagen">
		              			<input id="ip" type="image" style="{{$create ? (old('imagen') ? 'width: 100%; height: 85%;' : 'display: none') : ($mascota->foto_mascota ? 'width: 100%; height: 85%;' : 'display: none')}}" src="{{$create ? '' : ($mascota->foto_mascota ? $mascota->foto_mascota : '')}}">
                			</div>
              			</div>
                  	</div>
				</div>
			</div>
			<div class="col-12 col-sm-9 col-md-9 col-lg-10 col-xl-10 dtsfam">
				<div class="form-row">
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="nombre_mascota">Nombre</label>
						<input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" value="{{$create ? old('nombre_mascota') : $mascota->nombre_mascota}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="edad">Edad</label>
						<input type="number" min="0" class="form-control" id="edad" name="edad" value="{{$create ? old('edad') : $mascota->edad}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="raza">Raza</label>
						<input type="text" class="form-control" id="raza" name="raza" value="{{$create ? old('raza') : $mascota->raza}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="numero_registro" class="lblnregistro">Número de Registro</label>
						<input type="text" class="form-control" id="numero_registro" name="numero_registro" value="{{$create ? old('numero_registro') : $mascota->numero_registro}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="aviso_emergencia">En caso de emergencia avisar a:</label>
						<input type="text" class="form-control" id="aviso_emergencia" name="aviso_emergencia" value="{{$create ? old('aviso_emergencia') : $mascota->aviso_emergencia}}">
					</div>
					<div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
						<label for="telefono_emergencia" class="lbltelememasc">Teléfono</label>
						<input type="text" class="form-control" id="telefono_emergencia" name="telefono_emergencia" value="{{$create ? old('telefono_emergencia') : $mascota->telefono_emergencia}}">
					</div>
					<div class="form-check form-check-inline" style="margin-top: 1%;margin-left: 1%;">
							<input class="form-check-input" type="radio" id="inlineCheckbox1" name="sexo_mascota" value="Macho" {{$create ? ( old('sexo_mascota') == 'Macho' ? 'checked' : '' ) : ($mascota->sexo_mascota == 'Macho' ? 'checked' : '')}}>
							<label class="form-check-label" for="inlineCheckbox1">Macho</label>
					</div>
					<div class="form-check form-check-inline" style="margin-top: 1%;margin-left: 1%;">
							<input class="form-check-input" type="radio" id="inlineCheckbox2" name="sexo_mascota" value="Hembra" {{$create ? ( old('sexo_mascota') == 'Hembra' ? 'checked' : '' ) : ($mascota->sexo_mascota == 'Hembra' ? 'checked' : '')}}>
							<label class="form-check-label" for="inlineCheckbox2">Hembra</label>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center botonera">
						<button type="button" class="btn btn-gray" onclick="limpiar()">Cancelar</button>
						<button type="submit" id="submitForm" class="btn btn-red">Guardar</button>
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

	        //input2.style="width: 110px;height: 125px;display:block;padding:4%;";
	        input2.style="width: 133px;height: 125px;display:block;padding:1%;margin-top:0px;";

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
		document.getElementById("formmascota").reset();

	}
</script>
<script type="text/javascript">
	{{-- Boton lanza modal para confirmar --}}
	$("#formmascota").submit(function(e){
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
@endsection