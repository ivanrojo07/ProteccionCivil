<!DOCTYPE html>
<html>
<head>
	{{-- aqui va los estilos si se usan para diferentes vistas --}}
	{{-- 	  introducirlos en una etiqueta push o prepend  	--}}
	@stack('css')
	<style>
		body {
		  font-family: 'Oswald', sans-serif !important;
		}
		{{-- separar hojas --}}
		.page-break {
		    page-break-inside: avoid;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{ public_path('css/bootstrap4.css') }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{{$title}}</title>
</head>
<body>
@yield('header')
	<div class="container-fluid" style="top: 0px;bottom: 0px !important;">
		@yield('content')
	</div>
</body>
</html>