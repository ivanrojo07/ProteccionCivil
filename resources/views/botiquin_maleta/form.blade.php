<div class="caja-3d{{$name == 'maleta' ? 'maleta' : ''}}">
	<form action="{{ route($name.'.store')}}" method="POST">
		{{ csrf_field() }}
		<h3>Arma tu {{$name == 'botiquin' ? 'botiquín' : $name}}</h3>
		<div class="row">
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_medicamentos" value="1" {{$element ? ($element->medicamentos ? 'checked="" disabled=""' : 'disabled=""') : (old('medicamentos') ? 'checked=""' : '') }} name="medicamentos">
						<label class="form-check-label" for="{{$name}}_medicamentos"><img class="medicamentos" src="{{ asset('images/familiar/Imagenes-21.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_medicamentos">Medicamentos para algún tratamiento en específico</label>
				</div>
			</div>

			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_guantes" value="1" {{$element ? ($element->guantes ? 'checked="" disabled=""' : 'disabled=""') : (old('guantes') ? 'checked=""' : '') }} name="guantes">
						<label class="form-check-label" for="{{$name}}_guantes"><img src="{{ asset('images/familiar/Imagenes-22.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_guantes">Guantes de látex</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_algodon" value="1" {{$element ? ($element->algodon ? 'checked="" disabled=""' : 'disabled=""') : (old('algodon') ? 'checked=""' : '') }} name="algodon">
						<label class="form-check-label" for="{{$name}}_algodon"><img src="{{ asset('images/familiar/Imagenes-23.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_algodon">Algodón</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_cinta_adhesiva" value="1" {{$element ? ($element->cinta_adhesiva ? 'checked="" disabled=""' : 'disabled=""') : (old('cinta_adhesiva') ? 'checked=""' : '') }} name="cinta_adhesiva">
						<label class="form-check-label" for="{{$name}}_cinta_adhesiva"><img src="{{ asset('images/familiar/Imagenes-21.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_cinta_adhesiva">Cinta adhesiva</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_termometro" value="1" {{$element ? ($element->termometro ? 'checked="" disabled=""' : 'disabled=""') : (old('termometro') ? 'checked=""' : '') }} name="termometro">
						<label class="form-check-label" for="{{$name}}_termometro"><img src="{{ asset('images/familiar/Imagenes-24.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_termometro">Termómetro</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_antiseptico" value="1" {{$element ? ($element->antiseptico ? 'checked="" disabled=""' : 'disabled=""') : (old('antiseptico') ? 'checked=""' : '') }} name="antiseptico">
						<label class="form-check-label" for="{{$name}}_antiseptico"><img src="{{ asset('images/familiar/Imagenes-25.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_antiseptico">Antiséptico</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_gasas" value="1" {{$element ? ($element->gasas ? 'checked="" disabled=""' : 'disabled=""') : (old('gasas') ? 'checked=""' : '') }} name="gasas">
						<label class="form-check-label" for="{{$name}}_gasas"><img src="{{ asset('images/familiar/Imagenes-26.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_gasas">Gasas</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_tijeras" value="1" {{$element ? ($element->tijeras ? 'checked="" disabled=""' : 'disabled=""') : (old('tijeras') ? 'checked=""' : '') }} name="tijeras">
						<label class="form-check-label" for="{{$name}}_tijeras"><img src="{{ asset('images/familiar/Imagenes-27.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_tijeras">Tijeras</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_yodo" value="1" {{$element ? ($element->yodo ? 'checked="" disabled=""' : 'disabled=""') : (old('yodo') ? 'checked=""' : '') }} name="yodo">
						<label class="form-check-label" for="{{$name}}_yodo"><img src="{{ asset('images/familiar/Imagenes-28.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_yodo">Yodo</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_curitas" value="1" {{$element ? ($element->curitas ? 'checked="" disabled=""' : 'disabled=""') : (old('curitas') ? 'checked=""' : '') }} name="curitas">
						<label class="form-check-label" for="{{$name}}_curitas"><img src="{{ asset('images/familiar/Imagenes-29.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_curitas">Curitas</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_vendas" value="1" {{$element ? ($element->vendas ? 'checked="" disabled=""' : 'disabled=""') : (old('vendas') ? 'checked=""' : '') }} name="vendas">
						<label class="form-check-label" for="{{$name}}_vendas"><img src="{{ asset('images/familiar/Imagenes-30.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_vendas">Vendas elásticas (5 y 10 cm)</label>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 elementos">
				<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" id="{{$name}}_cubrebocas" value="1" {{$element ? ($element->cubrebocas ? 'checked="" disabled=""' : 'disabled=""') : (old('cubrebocas') ? 'checked=""' : '') }} name="cubrebocas">
						<label class="form-check-label" for="{{$name}}_cubrebocas"><img src="{{ asset('images/familiar/Imagenes-31.png') }}"></label>
						<label class="bot_medicamentos" for="{{$name}}_cubrebocas">Cubrebocas</label>
				</div>
			</div>
		</div>
		<br>
		<div class="botones">
			<button id="editar{{$name}}" onclick="editar_{{$name}}()" type="button" class="btn btn-danger botonD {{!$element ? 'd-none' : ''}}">Editar</button>
			<button id="guardar_{{$name}}" type="submit" class="btn btn-danger guardar {{$element ? 'd-none' : ''}}">Guardar</button>
			<a href="{{ route($name.".showSnappyPDF") }}" target="_blank" class="btn btn-danger botonD">Descargar</a>
			{{--< --button type="button" class="btn btn-danger botonD">Imprimir formato vacío</button>--}}
		</div>
	</form>
</div>