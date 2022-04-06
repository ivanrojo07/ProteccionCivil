@extends('layouts.pdf.layout_snappy',['title'=>$grupos['grupos_tipo']['nombre']])
@section('content')
	@foreach ($grupos['noneusers'] as $index=>$noneuser)
		<div class="row {{$index == 3 ? 'page-break' : ''}}" style="border-style: dashed; border-width: 1px;">
			<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch">
				<div class="card w-100 flex-fill">
				  <div class="card-header bg-info w-10">
				  </div>
				  <div class="card-body">
				   	<div class="row">
				   		<div class="col-6 ml-0 mr-0 bg-transparent">
				   			<h4 class="text-left text-info">
				   				Tarjeta de Seguridad
				   			</h4>
			   				Nombre:
			   				<span class="border-bottom">
			   					<strong>{{$noneuser['nombre']." ".$noneuser['paterno']." ".$noneuser['materno']}}</strong>
			   				</span>
				   		</div>
				   		<div class="col-6">
				   			<img src="{{$noneuser['avatar64']}}" class="img-fluid img-thumbnail float-right" height="100" width="120">
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-6">
				   			Edad:
			   				<span class="border-bottom">
			   					<strong>{{ $noneuser['fechadenacimiento'] ? \Carbon\Carbon::parse($noneuser['fechadenacimiento'])->age.' años' : 'N/A' }}</strong>
			   				</span>
				   		</div>
				   		<div class="col-6">
				   			Tipo Sanguineo:
				   			<span class="border-bottom">
			   					<strong>{{$noneuser['rh']}}</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-6">
				   			Alergias:
			   				<span class="border-bottom">
			   					<strong>{{$noneuser['alergias'] ? $noneuser['alergias'] : 'N/A'}}</strong>
			   				</span>
				   		</div>
				   		<div class="col-6">
				   			Enfermedades:
				   			<span class="border-bottom">
			   					<strong>{{$noneuser['condicion_medica'] ? $noneuser['condicion_medica'] : 'N/A'}}</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-12">
				   			No. de Seguro Social:
			   				<span class="border-bottom">
			   					<strong>{{$noneuser['numero_seguro']." / ".$noneuser['tipo_seguro']}}</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-12">
				   			En caso de emergencia avisa a:
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-12">
				   			Nombre:
			   				<span class="border-bottom">
			   					<strong>{{$noneuser['emergencia_contacto']}}</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-12">
				   			Teléfono:
			   				<span class="border-bottom">
			   					<strong>{{$noneuser['telefono_contacto']}}</strong>
			   				</span>
				   		</div>
				   	</div>
				  </div>
				  <div class="card-footer text-muted">
				    Protección Civil
				  </div>
				</div>
			</div>
			<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch">
				<div class="card w-100 flex-fill">
				  <div class="card-header bg-info w-10">
				  </div>
				  <div class="card-body">
				   	<div class="row">
				   		<div class="col-12 ml-0 mr-0 bg-transparent">
				   			<h4 class="text-left text-info">
				   				Teléfonos de Emergencia
				   			</h4>
				   		</div>
				   	</div>
				   	<div class="row mt-5">
				   		<div class="col-12">
				   			Secretaría de Protección Civil:
			   				<span>
			   					<strong>56 83 22 22</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row mt-2">
				   		<div class="col-12">
				   			Emergencias de la Ciudad:
			   				<span>
			   					<strong>066</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row mt-2">
				   		<div class="col-12">
				   			Heroico Cuerpo de Bomberos:
			   				<span>
			   					<strong>068</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row mt-2 mb-5">
				   		<div class="col-12">
				   			Locatel:
			   				<span>
			   					<strong>56 58 11 11</strong>
			   				</span>
				   		</div>
				   	</div>
				   	
				  </div>
				  <div class="card-footer text-muted">
				    Protección Civil
				  </div>
				</div>
			</div>
		</div>
	@endforeach
@endsection