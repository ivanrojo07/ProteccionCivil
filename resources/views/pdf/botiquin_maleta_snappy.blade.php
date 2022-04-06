@extends('layouts.pdf.layout_snappy',['title'=>$nombre])
@section('content')
<div class="card">
  	<div class="card-header bg-info text-center text-white">
  		<h5>
    		{{$nombre}}
  		</h5>
  	</div>
  	<div class="card-body">
	    <div class="row mt-5 mb-5 ml-5">
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_medicamentos" value="1" {{$elemento ? ($elemento->medicamentos ? 'checked="" disabled=""' : 'disabled=""') : (old('medicamentos') ? 'checked=""' : '') }} name="medicamentos">
					<label class="form-check-label" for="{{$nombre}}_medicamentos"><img class="medicamentos" src="{{ public_path('images/familiar/Imagenes-21.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_medicamentos">Medicamentos para algún <br> tratamiento en específico</label>
				</div>
			</div>

			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_guantes" value="1" {{$elemento ? ($elemento->guantes ? 'checked="" disabled=""' : 'disabled=""') : (old('guantes') ? 'checked=""' : '') }} name="guantes">
					<label class="form-check-label" for="{{$nombre}}_guantes"><img src="{{ public_path('images/familiar/Imagenes-22.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_guantes">Guantes de látex</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_algodon" value="1" {{$elemento ? ($elemento->algodon ? 'checked="" disabled=""' : 'disabled=""') : (old('algodon') ? 'checked=""' : '') }} name="algodon">
					<label class="form-check-label" for="{{$nombre}}_algodon"><img src="{{ public_path('images/familiar/Imagenes-23.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_algodon">Algodón</label>
				</div>
			</div>
		</div>
		<div class="row mt-5 mb-5 ml-5">
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_cinta_adhesiva" value="1" {{$elemento ? ($elemento->cinta_adhesiva ? 'checked="" disabled=""' : 'disabled=""') : (old('cinta_adhesiva') ? 'checked=""' : '') }} name="cinta_adhesiva">
					<label class="form-check-label" for="{{$nombre}}_cinta_adhesiva"><img src="{{ public_path('images/familiar/Imagenes-21.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_cinta_adhesiva">Cinta adhesiva</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_termometro" value="1" {{$elemento ? ($elemento->termometro ? 'checked="" disabled=""' : 'disabled=""') : (old('termometro') ? 'checked=""' : '') }} name="termometro">
					<label class="form-check-label" for="{{$nombre}}_termometro"><img src="{{ public_path('images/familiar/Imagenes-24.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_termometro">Termómetro</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_antiseptico" value="1" {{$elemento ? ($elemento->antiseptico ? 'checked="" disabled=""' : 'disabled=""') : (old('antiseptico') ? 'checked=""' : '') }} name="antiseptico">
					<label class="form-check-label" for="{{$nombre}}_antiseptico"><img src="{{ public_path('images/familiar/Imagenes-25.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_antiseptico">Antiséptico</label>
				</div>
			</div>
		</div>
		<div class="row mt-5 mb-5 ml-5">
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_gasas" value="1" {{$elemento ? ($elemento->gasas ? 'checked="" disabled=""' : 'disabled=""') : (old('gasas') ? 'checked=""' : '') }} name="gasas">
					<label class="form-check-label" for="{{$nombre}}_gasas"><img src="{{ public_path('images/familiar/Imagenes-26.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_gasas">Gasas</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$nombre}}_tijeras" value="1" {{$elemento ? ($elemento->tijeras ? 'checked="" disabled=""' : 'disabled=""') : (old('tijeras') ? 'checked=""' : '') }} name="tijeras">
						<label class="form-check-label" for="{{$nombre}}_tijeras"><img src="{{ public_path('images/familiar/Imagenes-27.png') }}"></label>
						<label class="text-center" for="{{$nombre}}_tijeras">Tijeras</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_yodo" value="1" {{$elemento ? ($elemento->yodo ? 'checked="" disabled=""' : 'disabled=""') : (old('yodo') ? 'checked=""' : '') }} name="yodo">
					<label class="form-check-label" for="{{$nombre}}_yodo"><img src="{{ public_path('images/familiar/Imagenes-28.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_yodo">Yodo</label>
				</div>
			</div>
		</div>
		<div class="row mt-5 mb-5 ml-5">
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$nombre}}_curitas" value="1" {{$elemento ? ($elemento->curitas ? 'checked="" disabled=""' : 'disabled=""') : (old('curitas') ? 'checked=""' : '') }} name="curitas">
						<label class="form-check-label" for="{{$nombre}}_curitas"><img src="{{ public_path('images/familiar/Imagenes-29.png') }}"></label>
						<label class="text-center" for="{{$nombre}}_curitas">Curitas</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_vendas" value="1" {{$elemento ? ($elemento->vendas ? 'checked="" disabled=""' : 'disabled=""') : (old('vendas') ? 'checked=""' : '') }} name="vendas">
					<label class="form-check-label" for="{{$nombre}}_vendas"><img src="{{ public_path('images/familiar/Imagenes-30.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_vendas">Vendas elásticas (5 y 10 cm)</label>
				</div>
			</div>
			<div class="col-4 elementos">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{$nombre}}_cubrebocas" value="1" {{$elemento ? ($elemento->cubrebocas ? 'checked="" disabled=""' : 'disabled=""') : (old('cubrebocas') ? 'checked=""' : '') }} name="cubrebocas">
					<label class="form-check-label" for="{{$nombre}}_cubrebocas"><img src="{{ public_path('images/familiar/Imagenes-31.png') }}"></label>
					<label class="text-center" for="{{$nombre}}_cubrebocas">Cubrebocas</label>
				</div>
			</div>
		</div>
  	</div>
  	<div class="card-footer text-muted text-center">
		Protección Civil
  	</div>
</div>
<table class="table table-bordered mt-2 pb-0">
	<thead class="bg-info text-center text-white">
		<tr>
			<th scope="row" colspan="4">
				Otros materiales
			</th>
		</tr>
		<tr>
			<th scope="row" style="width: 10%">Verificado</th>
			<th scope="row">Material</th>
			<th scope="row" style="width: 10%">Verificado</th>
			<th scope="row">Material</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row"></th>
			<td></td>
			<th scope="row"></th>
			<td></td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td></td>
			<th scope="row"></th>
			<td></td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td></td>
			<th scope="row"></th>
			<td></td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td></td>
			<th scope="row"></th>
			<td></td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td></td>
			<th scope="row"></th>
			<td></td>
		</tr>
		<tr>
			<th scope="row"></th>
			<td></td>
			<th scope="row"></th>
			<td></td>
		</tr>
	</tbody>
</table>
@endsection