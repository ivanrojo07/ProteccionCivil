@extends('layouts.layout2')
@section('titulo','Plan Familiar')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/planfamiliar.css') }}">
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
<!--**************************************************************************************************-->
<div class="container-fluid body">

	{{--SECCION INICIAL--}}
	<div class="row">
		<div class="col-12 portada">
			<div class="col-12 titulo">
				<h1>MI PLAN FAMILIAR</h1>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-12  barraProgreso">
			<div class="row">
				{{-- Barra de progreso --}}
				@include('inicio.progress', ['user' => $user])
        		{{-- Aqui termina barra de progreso --}}
        	</div>
		</div>
	</div>

	{{--SECCION PLAN FAMILIAR / IDENTIFICA--}}
	<div class="row seccion2" id="identifica">
		<div class="col-12">
			<div class="row">
				<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0 titulos">
					<span>¿Qué es mi <h1>PLAN FAMILIAR?</h1></span>
					<hr>
					<p>Es un plan estratégico que te ayudará a conocer, prevenir, reducir y controlar los peligros generados por una emergencia o desastre. El contar con un Plan familiar elaborado y comprendido por todos los integrantes de tu familia les permitirá saber que hacer en caso de emergencia y actuar efectivamente en caso de que sea necesario.</p>
				</div>
				<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0 imgPlan">
					<img src="{{ asset('images/familiar/Imagenes-03.png') }}" alt="Imagen">
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0 imgIdentifica2">
					<img src="{{ asset('images/familiar/Imagenes-04.png') }}">
				</div>
				<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0 textoIdentifica" >
					<h1>Identifica</h1>
					<hr>
					<p>En familia, con tus roomies o tú mismo realiza un recorrido de reconocimiento en tu casa y al exterior de ella, con el objetivo de identificar las áreas de tu casa, las rutas de evacuación y los puntos estratégicos, pues será información que te ayudará a elaborar un croquis de seguridad.</p>
					<p>Si vives en un departamento, considera el nivel en el que te encuentras, las áreas comunes, las instalaciones de emergencia como salidas de emergencia o escaleras hasta si vives en una casa compartida, privada de uno o varios niveles, registra todos los detalles en todas las plantas y los espacios que sean de tu uso cotidiano, incluso los estacionamientos privados, jardines o corredores, una emergencia puede ocurrir en cualquier lugar. De mismo modo considera el exterior de tu casa como la calle, árboles, instalaciones de servicio u otro.</p>
				</div>
			</div>
		</div>
	</div>

	{{--SECCION PLANEA--}}
	<div class="row seccion3" id="planea">

		<div class="col-12">
			<div class="row">
				<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0 Planea">
					<h1>Planea</h1>
					<hr>
					<h3><strong>Detecta y reduce</strong> riesgos al interior y exterior de tu casa.</h3>
					<p>La prevención es la mejor alternativa para reducir riesgos, es importante que tengas en cuentas las revisiones frecuentes que deben realizarse a las distintas instalaciones ubicadas al interior de tu casa, así como tomar en cuenta instalaciones al exterior o en la periferia de tu casa, esto reducirá el riesgo de accidentes que afecten a miembros de tu familia o animales de compañia.</p>
				</div>
				<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0 imgPlanea2">
					<img src="{{ asset('images/familiar/Imagenes-06.png') }}" alt="imagen">
				</div>
			</div>
		</div>
		
		<div class="col-12 col-lg-12 riesgos">
			<h4>Detecta riesgos al interior en tu hogar</h4>
			<hr>
			<hr class="hr2">

			<div class="row">
				<div class="col-2 imgCasa">
					<img src="{{ asset('images/familiar/Imagenes-14.png') }}" alt="casita">
				</div>
				<div class="col-12 col-md-12 col-lg-10 col-xl-10">
					<div class="row">
						<div class="col-12 offset-sm-0  col-sm-11 offset-sm-1 col-md-10 col-lg-12 offset-lg-1 col-xl-10 offset-xl-0  riesgos2">
							<span>Identifica posibles peligros en cualquiera de estas instalaciones</span>
						</div>
						<div class="col-12 offset-0 col-sm-5 offset-sm-0 col-lg-6 offset-lg-0 col-xl-5 offset-xl-0 lista">
							<span>Instalaciones Eléctricas</span>
							<ul>
								<li>Apagadores, contactos,focos,interruptores,cableado.</li>
							</ul>
							<span>Instalaciones Sanitarias</span>
							<ul>
								<li>Tuberias, drenaje, WC, coladeras y registros.</li>
							</ul>
						</div>
						<div class="col-12 offset-0 col-sm-5 offset-sm-2 col-lg-6 offset-lg-0 col-xl-5 offset-xl-0 lista">
							<span>Agua</span>
							<ul>
								<li>Cisternas, tuberías, tinacos, accesorios de lavabo, regadera y fregadero.</li>
							</ul>
							<span>Instalación de Gas</span>
							<ul>
								<li>Estufa, calentador, cilindros de gas LP u otro, tanque estacionario.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{--SECCION TIPS RIESGOS--}}
	<div class="row seccion4">

		<div class="col-12">
			<div class="row seccion5">
				<div class="col-12 offset-0 tituloTips"> 
					<h3>Tips para reducir riesgos en el hogar</h3>
				</div>
				
				<div class="col-12 offset-0 col-sm-6 offset-sm-0 col-lg-6 offset-lg-0 col-xl-4 offset-xl-1 lista2">
					<div>
						<span>Instalaciones Eléctricas</span>
						<ul>
							<li>Evita sobrecargar los contactos eléctricos conectando exceso de aparatos eléctricos, pueden provocar un corto circuito.</li>
						</ul>
						<div class="verMas">
							<a href="#">ver más...</a>
						</div>
					</div>
					<div>
						<span>Instalaciones de Gas</span>
						<ul>
							<li>Para verificar que las instalaciones no tengan fugas, coloca agua con jabón en las conexiones, si se ven burbujas, será necesario que llames a un especialista.</li>
						</ul>
						<div class="verMas">
							<a href="#">ver más...</a>
						</div>
					</div>
					<div>
						<span>Agua</span>
						<ul>
							<li>Elimina los goteos en todas las llaves y tomas de agua.</li>
							<li>Revisa que las tuberías no presenten ningún tipo de fuga.</li>
						</ul>
						<div class="verMas">
							<a href="#">ver más...</a>
						</div>
					</div>
					<div>
						<span>Muebles y sustancias</span>
						<ul>
							<li>Sujeta muebles y objetos voluminosos que puedan caer o derrumbarse</li>
							<li>Reubica objetos que se encuentren en pasillos o puertas y que puedan caer</li>
						</ul>
						<div class="verMas">
							<a href="#">ver más...</a>
						</div>
					</div>
				</div>

				<div class="col-12 offset-0 col-sm-5 offset-sm-1 col-lg-6 offset-lg-0 col-xl-4 offset-xl-1 lista2">
					<div>
						<span>Instalaciones Sanitarias</span>
						<ul>
							<li>Evita arrojar comida o cualquier objeto a tuberías, se pueden tapar.</li>
							<li>Revisa que los accesorios de la caja de la taza de baño y el flotador funcionen correctamente.</li>
						</ul>
						<div class="verMas">
							<a href="#">ver más...</a>
						</div>
					</div>
					<div>
						<span>Identifica la estructura de tu casa</span>
						<ul>
							<li>Revisa periódicamente la estructura de tu casa, edificio o viviendo, pon atención a los detalles y tómate el tiempo necesario para explorar sus muros, castillos.</li>
						</ul>
						<div class="verMas">
							<a href="#">ver más...</a>
						</div>
						<div class="imgEstructura">
							<img src="{{ asset('images/familiar/Imagenes-05.png') }}" alt="infraestructura">
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-12 exterior">
			<h4>Detecta riesgos al exterior de tu hogar</h4>
			<hr>
			<hr class="hr2">
			<div class="row">
				<div class="col-2 imgCasa">
					<img src="{{ asset('images/familiar/Imagenes-14.png') }}" alt="casita">
				</div>
					<div class="col-11 col-md-10 col-lg-10 col-xl-10">
						<div class="row exterior_riesgos">
							<div class="col-12 col-sm-11 offset-sm-2 col-lg-12 offset-lg-0 col-xl-10 offset-xl-0">
								<span>Identifica riesgos al exterior o en la periferia de tu casa, podrían representar un riesgo potencial para tu casa o tu familia, esta revisión será de suma importancia para elaborar tu Plan Familiar.</span>
							</div>
								<div class="col-12 col-sm-6 offset-sm-0 col-lg-6 offset-lg-0 col-xl-5 offset-xl-0 lista3">
								<ul>
									<li>Identifica construcciones antiguas, dañadas o en proceso de edificación, que puedan representar un riesgo de derrumbe.</li>
								</ul>
							<ul>
								<br>
								<li>Ubica instalaciones de servicio como gasolineras, gaseras, plantas de manejo de desechos peligrosos, industrias y cualquier otro espacio de riesgo.</li>
							</ul>

							</div>
								<div class="col-12 col-sm-5 offset-sm-0 col-lg-6 offset-lg-0 col-xl-5 offset-xl-0 lista3">
								<ul>
									<li>Ya sea en tu calle como en la zona en la que vives ten en cuenta la ubicación de cableado, trasformadores, torres de alta tensión eléctrica, cables caídos u otros. Si detectas alguno dañado notíficalo a la instancia que corresponda.</li>
								</ul>
								<ul>
									<li>También las condiciones físicas de la zona en donde vives son importantes, así que deberás identificar ríos cercanos, cauce de agua, laderas, etc.</li>
								</ul>
								</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	
	{{--SECCION MANOS A LA OBRA--}}
	<div class="row seccion6">
		<div class="caja3d">
			<div class="row">
				<div class="col-12 tituloObra">
					<h2>Manos a la obra</h2>
				</div>

				<div class="col-11 col-md-10 col-lg-12 col-xl-6 PlanoIE">
					<span>Plano interno & externo del inmueble</span>
					<div>
						<img src="{{ asset('images/Iconos-02.png') }}">
					</div>
					<p>Este esquema es un ejemplo de cómo puedes trazar tu croquis, indica dónde se encuentran las instalaciones de luz, agua y gas, así como las zonas  de menor riesgo, rutas de evacuación, punto de reunión externo, etcétera. De suma importancia para elaborar tu Plan Familiar. </p>

					<div class="col-12 col-md-12 col-lg-12 col-xl-12  divTitulo">
						<h2>Plano Interno</h2>
					</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 divParrafo">
							<p>Con la familia reunida, colaboren para dibujar en el formato descargable que te proporcionaremos, un croquis de tu hogar al interior y exterior para identifiquen dónde se encuentran las instalaciones de luz, agua y gas, así como las zonas de menor riesgo, rutas de evacuación, punto de reunión, etcétera.</p>
							<br>
							<form id="plano_interno_form" method="POST" action="{{ route('planos.submit_plano_interno') }}">
								@csrf
								<div class="form-group">
									<div class="botones">
										<input type="file" class="form-control-file" id="plano_interno_image" accept="image/*" name="plano_interno_image">
								    	<input type="hidden" name="plano_interno" id="plano_interno" value="">
										<button type="submit" class="btn btn-danger botonD">Subir Plano Interno</button>
										@if ($user->planos && isset($user->planos->plano_interno))
										{{-- Descargar el plano guardado --}}
										{{-- <a href="{{ route('planos.downloadSnappyInternoPDF') }}" class="btn btn-danger botonD"><span class="glbl glbl-descarga"></span Descargar plano creado</a> --}}
										<a href="{{ route('planos.showSnappyInternoPDF') }}" target="_blank" class="btn btn-danger botonI">Imprimir plano creado</a>
										@endif
										{{-- Descargar plano vacio --}}
										{{-- <a href="{{ route('planos.downloadSnappyInternoEmptyPDF') }}" class="btn btn-danger botonD"><span class="glbl glbl-descarga"></span>Descargar formato vacío</a> --}}
										<a href="{{ route('planos.showSnappyInternoEmptyPDF') }}" target="_blank" class="btn btn-danger botonI">Imprimir formato vacío</a>
									</div>
								</div>
							</form>
						</div>
					<div class="col-12 col-md-12 col-lg-12 col-xl-12  divTitulo">
						<h2>Plano Externo y Punto de Reunión</h2>
					</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 divParrafo">
							<p>Considera que también debes identificar los riesgos al exterior de tu casa, así que en este otro formato descargable dibuja tu hogar en relación a elementos potencionalmente peligrosos como construcciones, gasolineras, barrancas, árboles y postes en mal estado, fábricas, etc.</p>
							<br>
							<form id="plano_externo_form" method="POST" action="{{ route('planos.submit_plano_externo') }}">
								@csrf
								<div class="form-group">
								    <input type="file" class="form-control-file" id="plano_externo_image" accept="image/*" name="plano_externo_image">
								    <input type="hidden" name="plano_externo" id="plano_externo" value="">
									<div class="botones">
										<button type="submit" class="btn btn-danger botonD">Subir Plano Externo</button>
										@if ($user->planos && isset($user->planos->plano_interno))
										{{-- Descargar el plano guardado --}}
										{{-- <a href="{{ route('planos.downloadSnappyInternoPDF') }}" class="btn btn-danger botonD"><span class="glbl glbl-descarga"></span Descargar plano creado</a> --}}
										<a href="{{ route('planos.showSnappyExternoPDF') }}" target="_blank" class="btn btn-danger botonI">Imprimir plano creado</a>
										@endif
										{{-- Descargar plano vacio --}}
										{{-- <a href="{{ route('planos.downloadSnappyInternoEmptyPDF') }}" class="btn btn-danger botonD"><span class="glbl glbl-descarga"></span>Descargar formato vacío</a> --}}
										<a href="{{ route('planos.showSnappyExternoEmptyPDF') }}" target="_blank" class="btn btn-danger botonI">Imprimir formato vacío</a>
									</div>
								</div>
							</form>
						</div>
				</div>

				<div class="col-6 col-md-2 col-lg-12 col-xl-6 divPlano">
					<img src="{{ asset('images/familiar/ImagenZona-32.png') }}" alt="Estructura">
				</div>
			</div>
		</div>
	</div>
	{{-- Aqui termina manos a la obra --}}
	
	{{--SECCION ORGANIZA / BOTIQUIN--}}
	<div class="row seccion7" id="organiza">
		<div class="col-12">
			<div class="row organiza">
				<div class="col-12 col-md-12 col-lg-6 col-xl-6 imgorganiza">
					<img src="{{ asset('images/familiar/Imagenes-07.png') }}" alt="bici">
				</div>
				<div class="col-12 col-md-12 col-lg-6 col-xl-6 titulosOrganiza">
					<h1>Organiza</h1>
					<hr>
					<p>Para completar tu estrategia prepara material que podría ser de utilidad ante una emergencia, como medicamentos, documentos, comida, etc. en paquetes concretos y ordenados, es por eso que te recomendamos contar con 4 insumos elementales para la seguridad de tu familia, compañeros de espacio o roomies o tus animales de compañia.</p>
					<br><br>
					<div class="row divImagenes">
						<div class="col-3 iconosOrganiza">
							<div class="centrar">
								<img src="{{ asset('images/familiar/Imagenes-17.png') }}" alt="botiquin">
							</div>
							<div>
								<span>Botiquín de Primeros Auxilios</span>
							</div>
						</div>
						<div class="col-3 iconosOrganiza">
							<div class="centrar">
								<img src="{{ asset('images/familiar/Imagenes-18.png') }}" alt="maleta">
							</div>
							<div>
								<span>Maleta de Vida</span>
							</div>
						</div>
						<div class="col-3 iconosOrganiza">
							<div class="centrar">
								<img src="{{ asset('images/familiar/Imagenes-19.png') }}" alt="Documentos">
							</div>
							<div>
								<span>Documentos Importantes</span>
							</div>
						</div>
						<div class="col-3 iconosOrganiza">
							<div class="centrar">
								<img src="{{ asset('images/familiar/Imagenes-20.png') }}" alt="Extintor">
							</div>
							<div>
								<span>Extintor</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="col-12 botiquin1">
			<div class="caja3d">
				<div class="row">
					<div class="col-4 tituloBotiquin">
						<br>
						<span>Botiquín de primeros auxilios</span>
						<div>
							<img class="icono" src="{{ asset('images/Iconos-02.png') }}">
						</div>
						<p>Te presentamos los insumos mínimos para armar un botiquín básico, sin embargo puedes hacerlo tan completo como tu lo quieras o con los medicamentos, enceres y sustancias que consideres importantes, como algunas pastillas del medicamento para la presión de mamá o férulas o material ortopédico, el respirador de tu hijo pequeño o cualquier otro que sea necesario incluir.</p>
						<p>Selecciona los insumos que ya tengas y descarga tú botiquín de primeros auxilios.</p>
						<div>
							<img class="iconoBotiquin" src="{{ asset('images/familiar/Imagenes-17.png') }}">
						</div>
					</div>

					<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-8 offset-lg-0 col-xl-8 offset-xl-0 divBotiquin">
						{{-- TARJETA CON FORMULARIO DEL BOTIQUIN --}}
						@include('botiquin_maleta.form', ['element' => $user->botiquin, 'name'=>'botiquin'])
					</div>
				</div>
			</div>
		</div>
	<br>
	{{-- SECCION MALETA / DOCUMENTOS --}}
	<div class="row">
		<div class="col-12">
			<div class="caja3d">
				<div class="row">
					<div class="col-4 tituloMaleta">
						<br>
						<span>Maleta de vida</span>
						<div>
							<img class="icono" src="{{ asset('images/Iconos-02.png') }}" alt="">
						</div>
						<p>Considerar armar una maleta lo más ligera posible, transportable y que cualquier miembro de la familia pueda tomar rápidamente si fuera necesario, aquí te sugerimos algunos de los componentes necesarios, sin embargo nadie como tú sabe cuáles son las necesidades particulares de tu familia, tú tienes la mejor respuesta para armarla.</p>
						<p>Selecciona los insumos que ya tengas y descarga tú maleta de vida.</p>
						<div class="iconoMaleta">
							<img src="{{ asset('images/familiar/Imagenes-18.png') }}" alt="">
						</div>
					</div>

					<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-8 offset-lg-0 col-xl-8 offset-xl-0 divMaletas">
						@include('botiquin_maleta.form', ['element' => $user->maleta, 'name'=>'maleta'])
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-12">
			<div class="row documentos">
				<div class="col-12 col-sm-12 col-lg-8 col-xl-8 ">
					<div class="row doc">
						<div class="col-12 col-sm-12 col-lg-6 offset-lg-0 col-xl-6 offset-xl-0  tituloDoc">
							<h3>Documentos importantes</h3>
							<hr>
						</div>
					</div>
					<div class="row docs">
						<div class="col-1 imgDoc">
							<img src="{{ asset('images/familiar/Imagenes-19.png') }}">
						</div>
						<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-5 offset-xl-0  divDoc">
							<p>Reúne al menos copias de documentos personales y de los habitantes de tu hogar, de aquellos que puedas resguardar originales hazlo también. Así mismo digitalízalos y almacena esos archivos digitales en una memoria USB o disco duro que deberás adjuntar al mismo paquete de documentos, guarda todo en una bolsa de plástico con cierre hermético o al menos con un buen nudo para que no se mojen o dañen en caso de una inclemencia, estos deberás incluirlos a la Maleta de Vida para salir con ellos rápidamente.<br>Considera también enviártelos por correo electrónico o resguardarlos en un servicio de almacenamiento en nube para contar con otra copia digital que puedas consultar.</p>
						</div>

						<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-5 offset-xl-0  divDocs">
							<span>Te sugerimos la siguiente lista de documentos:</span>
							<ul>
								<li>Actas de nacimiento.</li>
								<li>Comprobante de domicilio.</li>
								<li>Credencial con fotografía (INE, licencia, etc.)</li>
								<li>CURP.</li>
								<li>Certificado de estudios.</li>
								<li>Facturas de tus bienes materiales (casa, automóvil, etc.)</li>
								<li>Información médica.</li>
								<li>Cartilla de vacunación.</li>
								<li>Carnet de salud.</li>
								<li>Escritura.</li>
								<li>Plano de instalaciones eléctricas y sanitarias.</li>
								<li>Plano arquitectónico y estructural.</li>
								<li>Documentación financiera: cuentas bancarias, seguros de vida e inversiones.</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-lg-4 col-xl-4 extintor">
					<div class="row">
						<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-6 offset-lg-0 col-xl-4 offset-xl-0  divExtintor">
							<h3>Extintor</h3>
							<hr>
						</div>
					</div>
					<div class="row extintor">
						<div class="col-12 offset-0 col-lg-2 offset-0 col-xl-2 divimgExtintor">
							<img src="{{ asset('images/familiar/Imagenes-20.png') }}">
						</div>
						<div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-12 offset-lg-0 col-xl-6 offset-xl-0 textoExtintor">
							<p>Cuenta en tu hogar con un extintor de 2.5 kg., el cual debe situarse en un lugar visible, de fácil acceso y en zonas de posible riesgo, por ejemplo, cerca de la cocina.</p>
							<p>Revisa periódicamente la caducidad del extintor</p>
							<p>También se recomienda que coloques detectores de humo en pasillos, sala y habitaciones.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="imagen col-6">
			<div class="botonRegresar">
				{{--  <button class="btn regresar" onclick="irInicio()">Regresar</button>
				<button class="btn regresar" onclick="irprueba()">Regresar</button>--}}
				<a href="javascript:void(0);" id="scroll" title="Scroll to Top">Top<span></span></a>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function irInicio(){
		window.location= rutaApp+'';
	}
</script>
<script>
    $(function(){
        $("#contenidor").scroll(function(){
            var scrollsubir=$("#contenidor").scrollTop();
            //console.log(scrollsubir);
            if(scrollsubir > 50){
                $('#scroll').fadeIn();
            }else{
                $('#scroll').fadeOut(); 
            }
        });
        $('#scroll').click(function(){ 
	        $("#contenidor").animate({ scrollTop: 0 }, 600); 
	        return false; 
	    });
    });
</script>
<script type="text/javascript">
    // ocultar boton guardar y editar Botiquin
    function editar_botiquin() {
    	// OCULTAR BOTON EDITAR Y MOSTRAR EL DE GUARDAR
    	$("button#editarbotiquin").addClass('d-none');
    	$("button#guardar_botiquin").removeClass('d-none');
    	// Habilitar los inputs
    	$("#botiquin_medicamentos").prop('disabled',false);
    	$("#botiquin_guantes").prop('disabled',false);
    	$("#botiquin_algodon").prop('disabled',false);
    	$("#botiquin_cinta_adhesiva").prop('disabled',false);
    	$("#botiquin_termometro").prop('disabled',false);
    	$("#botiquin_antiseptico").prop('disabled',false);
    	$("#botiquin_gasas").prop('disabled',false);
    	$("#botiquin_tijeras").prop('disabled',false);
    	$("#botiquin_yodo").prop('disabled',false);
    	$("#botiquin_curitas").prop('disabled',false);
    	$("#botiquin_vendas").prop('disabled',false);
    	$("#botiquin_cubrebocas").prop('disabled',false);
    }
    // ocultar boton guardar y editar Maleta
    function editar_maleta() {
    	// OCULTAR BOTON EDITAR Y MOSTRAR EL DE GUARDAR
    	$("button#editarmaleta").addClass('d-none');
    	$("button#guardar_maleta").removeClass('d-none');
    	// Habilitar los inputs
    	$("#maleta_medicamentos").prop('disabled',false);
    	$("#maleta_guantes").prop('disabled',false);
    	$("#maleta_algodon").prop('disabled',false);
    	$("#maleta_cinta_adhesiva").prop('disabled',false);
    	$("#maleta_termometro").prop('disabled',false);
    	$("#maleta_antiseptico").prop('disabled',false);
    	$("#maleta_gasas").prop('disabled',false);
    	$("#maleta_tijeras").prop('disabled',false);
    	$("#maleta_yodo").prop('disabled',false);
    	$("#maleta_curitas").prop('disabled',false);
    	$("#maleta_vendas").prop('disabled',false);
    	$("#maleta_cubrebocas").prop('disabled',false);
    }
	// funcion cargar circulo
    $(document).ready(function(){
        var el = document.getElementById('graph'); // get canvas

        var options = {
            percent:  el.getAttribute('data-percent') || 25,
            size: el.getAttribute('data-size') || 170,
            lineWidth: el.getAttribute('data-line') || 15,
            rotate: el.getAttribute('data-rotate') || 0
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');
        span.classList.add('label_porcent');
        span.textContent = 'Total '+options.percent + '%';
            
        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
                percent = Math.min(Math.max(0, percent || 1), 1);
                ctx.beginPath();
                ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
                ctx.strokeStyle = color;
                ctx.lineCap = 'round'; // butt, round or square
                ctx.lineWidth = lineWidth
                ctx.stroke();
        };

        drawCircle('#e6e2e7', options.lineWidth, 100 / 100);
        // SI PORCENTAJE ES 0 SE LLENABA EL CIRCULO, ESTE IF NO COLOREA NADA
        if(options.percent > 0){
            drawCircle('#9e00b1', options.lineWidth, options.percent / 100);
        }

    })
</script>
<script type="text/javascript">
    function detalle() {
        // CREA IMAGEN DEL CANVAS DEL PORCENTAJE DE PIE PORQUE NO PUEDES LANZAR UNA FUNCIÓN A UN ELEMENTO DE SCRIPT
        var canvas = document.getElementsByTagName("CANVAS")[0];
        var canvas_image = canvas.toDataURL();
        // LANZA SWEET ALERT
        Swal.fire({
          title: '<strong>Mi Plan Familiar</strong>'+'<br>',
          html: @include('inicio.status', ['user' => $user]),
          showCloseButton: true,
          focusConfirm: false,
          confirmButtonText:'Aceptar',
        })
    }
</script>
@endsection
