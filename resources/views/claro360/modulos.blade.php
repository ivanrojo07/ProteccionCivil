
<li><a href="#" onclick="crearLiga('https://incidentes.ml/API/cuenta360/access_token/')">Incidentes <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Incidentes.png') }}" alt="icono"></span></a></li>
<li><a href="#" onclick="crearLiga('https://seguridadsanitaria360.ml/lineamientos/API/cuenta360/access_token/')">Seguridad Sanitaria <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Seguridad_Sanitaria.png') }}" alt="icono"></span></a></li>
{{-- <li><a href="#" onclick="crearLiga('{{$plataforma360['url']}}API/cuenta360/access_token/')">Escuela 360 <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Consulta-Datos.png') }}" alt="icono"></span></a></li> --}}
<li><a href="#" onclick="crearLiga('https://empresas360.ml/plataforma360/API/cuenta360/access_token/')">Mi Empresa 360 <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Empresa360.png') }}" alt="icono"></span></a></li>
<li><a href="#" onclick="crearLiga('https://bcn.sos911.ml/plataforma360/API/cuenta360/access_token/')">Plataforma 360 <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Empresa360.png') }}" alt="icono"></span></a></li>
<li><a href="#" onclick="crearLiga('https://mapagis.ml/API/cuenta360/access_token/')">Visualización de Datos <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Consulta-Datos.png') }}" alt="icono"></span></a></li>
<li><a href="#" onclick="crearLiga('http://pruebasvideovigilancia.ml/API/cuenta360/access_token/')">Hogar Conectado <span class="icono"><img src="{{ asset('images/ICONOS HEADER (CORPORATIVO)/Icono-Seguridad_Sanitaria.png') }}" alt="icono"></span></a></li>
	{{--  @section('scripts')
		<script type="text/javascript">
			function crearLiga($url){
				var params = {
					"user_id" : "{{Session::get('claro360.id')}}",
					"token" : "{{Session::get('claro360.token')}}"
				};
				var id, access_token;
				console.log(params);
				axios.post("{{ route('getAccessToken') }}",params)
					.then(res=>{
						var data = res.data;
						id = data.id360;
						access_token = data.access_token
						if (id && access_token) {
							window.open($url+`${id}/${access_token}`);
						}
						else{
							alert('No se puede acceder a esta pagina, intentalo mas tarde');
						}
					})
					.catch(err=>alert(err.message));

				
			}
		</script>
	@endsection --}}