@extends('layouts.pdf.layout_snappy',['title'=>'Plano '.$tipo])
@section('content')
<div class="card text-center pb-0">
	<div class="card-header bg-info text-white">
		<h5>
			{{'Plano '.$tipo}}
		</h5>
	</div>
	<div class="card-body">
		@if (isset($elemento))
			<img src="{{$elemento}}" style="/*max-*/height: 750px !important;/*tamaño maximo para que no se rompa la imagen*/">
		@else
		 	{{-- Si tipo es Interno muestra la imagen muestra de plano interno, de lo contrario muestra la imagen de plano externo --}}
			<img src="{{ public_path($tipo == 'Interno' ? 'images/plano_casa_ejemplo/ZONA-DE-PASO-e1506359713831-1.jpg' : 'images/plano_casa_ejemplo/DISTRIBUCION-1-e1506360388613-1.jpg') }}" class="img-fluid rounded mx-auto d-block" style="/*max-*/height: 750px !important;/*tamaño maximo para que no se rompa la imagen*/">

		@endif
	</div>
	<div class="card-footer text-muted">
		Protección Civil
	</div>
</div>
@endsection