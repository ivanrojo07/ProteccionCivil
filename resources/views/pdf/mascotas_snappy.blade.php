@extends('layouts.pdf.layout_snappy',['title'=>'Mascotas'])
@section('content')
@if ($mascotas->isNotEmpty())
	<div class="row">
	@foreach ($mascotas as $index=>$mascota)
		{{-- expr --}}
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
			  	<div class="card-header bg-info w-10">
			  	</div>
			  	<div class="card-body">
			   		<div class="row">
			   			<div class="col-6 ml-0 mr-0 bg-transparent">
			   				<h4 class="text-left text-info">
			   					Mascota 
			   				</h4>
		   					Nombre:
		   					<span class="border-bottom">
		   						<strong>{{$mascota->nombre_mascota}}</strong>
		   					</span>
			   			</div>
				   		<div class="col-6">
				   			<img src="{{$mascota->foto_mascota}}" class="img-fluid img-thumbnail float-right" height="100" width="120">
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-4">
				   			Edad:
			   				<span class="border-bottom">
			   					<strong>{{$mascota->edad}} años</strong>
			   				</span>
				   		</div>
				   		<div class="col-4">
				   			Raza:
				   			<span class="border-bottom">
			   					<strong>{{$mascota->raza}}</strong>
			   				</span>
				   		</div>
				   		<div class="col-4">
				   			Sexo:
				   			<span class="border-bottom">
			   					<strong>{{$mascota->sexo_mascota}}</strong>
			   				</span>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col-12">
				   			No. de Registro:
			   				<span class="border-bottom">
			   					<strong>{{$mascota->numero_registro}}</strong>
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
			   					<strong>{{$mascota->aviso_emergencia}}</strong>
			   				</span>
				   		</div>
				   	</div>
			   		<div class="row">
			   			<div class="col-12">
			   			Teléfono:
		   					<span class="border-bottom">
		   						<strong>{{$mascota->telefono_emergencia}}</strong>
		   					</span>
			   			</div>
			   		</div>
			  	</div>
			  	<div class="card-footer border-info text-muted">
			    	Protección Civil
			  	</div>
			</div>
		</div>
		@if ((($index+1)%2 == 0))
	</div>
	<div class="row {{$index % 7 == 0 ? 'page-break' : ''}}">
		@endif
		
			
	@endforeach
	</div>
@else
	<div class="row">
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
		<div class="col-6 pt-1 pb-1 pl-1 pr-1 d-flex align-items-stretch" style="border-style: dashed; border-width: 1px;">
			<div class="card border-info w-100 flex-fill">
				<div class="card-header bg-info w-10">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 ml-0 mr-0 bg-transparent">
							<h4 class="text-left text-info">
								Mascota
							</h4>
							Nombre:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-6">
							<img src="" class="img-fluid img-thumbnail float-right" height="80" width="80" style="width: 80px; height: 80px">
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							Edad:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Raza:
							<span class="border-bottom">
							</span>
						</div>
						<div class="col-4">
							Sexo:
							<span class="border-bottom">
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							No. de Registro:
							<span class="border-bottom">
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
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							Teléfono:
							<span class="border-bottom">
							</span>
						</div>
					</div>
				</div>
				<div class="card-footer border-info text-muted">
				Protección Civil
				</div>
			</div>
		</div>
	</div>
@endif
@endsection