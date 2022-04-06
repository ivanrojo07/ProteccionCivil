@extends('layouts.layout2')
@section('titulo','Plan Actua')
@section('estilos')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/planactua.css') }}">
@endsection
@section('menu')
    <div class="row"  style="display: none;">
        <a href="{{ url('/') }}">Inicio</a>
        <div class="dropdown">
            <button class="dropbtn" ondblclick="irPlanFamiliar()">Plan Familiar<i class="fa fa-caret-down"></i>
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
        <div class="dropdown active">
            <button class="dropbtn" ondblclick="irPlanActua()" style="color: white;">Plan Actúa<i class="fa fa-caret-down"></i>
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

<!--*******************************************************************************************-->
<div class="container-fluid">
    {{-- SECCION INICIAL --}}
    <div class="row seccion1">
        <div class="imagen col-12">
            <div class="tituloActua">
                <h1>ACTÚA</h1>
            </div>
        </div>
        <div class="col-12 barraProgreso">
            <div class="row">
                {{-- Barra de progreso --}}
                @include('inicio.progress', ['user' => $user]) 
                {{-- Aqui termina barra de progreso --}}
            </div>
        </div>
        <div class="col-12 seccionDesastre">
            <div class="row myDIV">
                <div class="col-6 tituloDesastre">
                    <h2>DESASTRES NATURALES</h2>
                    <div class="col-12">
                        <nav id="navbar-example2" class="navbar1">
                            <ul class="nav nav-pills">
                                <div class="col-4 divImg">
                                    <li class="nav-item">
                                        <div class="divCirculo" id="divIncendio">
                                            <a class="nav-link enlace" href="#incendio"><img id="imgIncendio" src="{{ asset('images/actua/Incendio.png') }}" onclick="cambioImagen()"></a>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-4 divImg">
                                    <li class="nav-item">
                                        <div class="divCirculo" id="divInundacion">
                                            <a class="nav-link enlace" href="#inundacion"><img id="imgInundacion" src="{{ asset('images/actua/Inundacion.png') }}" onclick="cambioImagen2()"></a>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-4 divImg">
                                    <li class="nav-item">
                                        <div class="divCirculo" id="divSismo">
                                            <a class="nav-link enlace" href="#sismo"><img id="imgSismo" src="{{ asset('images/actua/Sismo.png') }}" onclick="cambioImagen3()"></a>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-6 tituloDesastre">
                    <h2>¿CÓMO ME PREPARO?</h2>
                    <div class="col-12">
                        <nav id="navbar-example2" class="navbar1">
                            <ul class="nav nav-pills">
                                <div class="col-4 offset-2 divImg">
                                    <li class="nav-item">
                                        <div class="divCirculo" id="divBrigada">
                                            <a class="nav-link" href="#brigada"><img id="imgBrigada" src="{{ asset('images/actua/Brigada.png') }}" onclick="cambioImagen4()"></a>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-4 divImg">
                                    <li class="nav-item">
                                        <div class="divCirculo" id="divSimulacro">
                                            <a class="nav-link" href="#simulacro"><img id="imgSimulacro" src="{{ asset('images/actua/Simularos.png') }}" onclick="cambioImagen5()"></a>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCION 2 DESASTRES - INCENDIO--}}
    <div class="row seccion2">
        <div class="col-12 tituloIncendio" id="incendio">
            <div class="row">
                <div class="col-12">
                    <h2>DESASTRES NATURALES</h2>
                </div>

                <div class="col-12 col-sm-10">
                    <h3>Incendio</h3>
                </div>

                <div class="col-2 imgFlama">
                    <img src="{{ asset('images/actua/actuaMesadetrabajo40.png') }}">
                </div>
                <hr>
            </div>
            <div class="row filaEtapas">
                <div class="col-12 col-sm-12 offset-sm-0 col-lg-12 offset-lg-0 col-xl-8 offset-xl-2">
                    <div class="row divLista">
                        <div class="col-12 col-sm-6 lista1">
                            <ul>
                                <li>Si se puede apagar el conato de incendio*, realícelo con precaución en lo que alguien más llama a los servicios de emergencia.</li><br>
                                <li>Si el horno se incendia, cierra la puerta y la llave de paso de gas, lo mismo con el microondas, cierra y desenchufa.</li><br>
                                <li>Quien sea responsable de cortar el suministro de energía y gas lo hará, siempre y cuando no corra peligro.</li><br>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6 lista1">
                            <ul>
                                <li>Si se trata de un incendio eléctrico nunca arrojes agua.</li><br>
                                <li>En caso de no poder controlar, evacúen el lugar conforme a lo planeado.</li><br>
                                <li>Si una olla o sartén contienen aceite caliente, nunca le arrojes agua porque el aceite salta expandiendo el fuego por otros lugares de la cocina, toma un trapo, mójalo y colócalo encima o cubre con una tapa para que se consuma el oxígeno, tambien puedes usar un extintor de polvo.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 divEtapas">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 antes">
                            <h3>Antes</h3>
                            <hr>
                            <hr class="hr23">
                            <div class="row">
                                <div class="col-2">
                                    <div class="imgExtintor">
                                        <img src="{{ asset('images/actua/actuaMesadetrabajo45.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-10 listaDesastres">
                                    <ul>
                                        <li>Tenga siempre un extintor cerca.</li>
                                        <li>Procure instalar un detector de humo.</li>
                                        <li class="elemento3">Revise constantemente llaves, uniones y cilindros que contengan cualquier tipo de gas inflamable.</li>
                                        <li>No sobrecargue las instalaciones eléctricas.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 durante">
                            <h3>Durante</h3>
                            <hr>
                            <hr class="hr23">
                            <div class="row">
                                <div class="col-2">
                                    <div class="imgDetector">
                                        <img src="{{ asset('images/actua/actuaMesadetrabajo46.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-10 listaDesastres">
                                    <ul>
                                        <li>Si hay humo, agáchase y gatee.</li>
                                        <li>Siga las instrucciones que le indiquen los cuerpos de socorro.</li>
                                        <li>Si su ropa arde, no corra, deténgase, agáchese y ruede en el piso para apagar el fuego.</li>
                                        <li>No sobrecargue las instalaciones eléctricas.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 despues">
                            <h3>Después</h3>
                            <hr>
                            <hr class="hr23">
                            <div class="row">
                                <div class="col-2">
                                    <div class="imgRun">
                                        <img src="{{ asset('images/actua/actuaMesadetrabajo47.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-10 listaDesastres">
                                    <ul>
                                        <li>Alejése del incidente, y permita que los cuerpos de socorro concluyan con su labor.</li>
                                        <li>Si hay heridos, pida auxilio a los cuerpos de socorro.</li>
                                        <li>Si su ropa arde, no corra, deténgase, agáchese y ruede en el piso para apagar el fuego.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--SECCION 3 INUNDACIÓN --}}
    <div class="row seccion3">
        <div class="col-12 tituloInundacion" id="inundacion">
            <div class="row">
                <div class="col-10">
                    <h3>Inundación</h3>
                </div>
                <div class="col-2 Inundacionimg">
                    <img src="{{ asset('../images/actua/actuaMesadetrabajo40copia.png') }}">
                </div>
            </div>
            <hr>
        </div>
        
        <div class="col-12 col-sm-12 offset-sm-0 col-lg-12 offset-lg-0 col-xl-10 offset-xl-2 seccionInundacion">
            <div class="row">
                <div class="col-12 mano">
                    <p>Ten a la mano los documentos importantes en una bolsa hérmetica. En caso de que el agua se introduzca en tu domicilio, desconecta la energía eléctrica. Mantente pendiente de la Alerta Temprana Meteorológica.</p>
                </div>

                <div class="col-12 detalles">
                    <div class="row">
                        <div class="col-6 offset-0 col-sm-3 offset-sm-3 col-lg-3 offset-lg-3 col-xl-2 offset-xl-3 divDetalles">
                            <span>Detalles</span>
                        </div>
                        <div class="col-6 col-sm-3 offset-sm-1 divAcciones">
                            <span>Acciones</span>
                        </div>
                    </div>
                </div>
            
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 order-2 col-sm-2 alertaV">
                            <span>Alerta verde</span>
                        </div>
                        <div class="col-6 order-1 col-sm-1 imgVerde">
                            <img src="{{ asset('../images/actua/actuaMesadetrabajo50.png') }}">
                        </div>
                        <div class="col-6 order-3 col-sm-3 col-lg-3 col-xl-2 lista2">
                            <ul>
                                <li>Lluvia: <10 mm/24h.</li>
                                <li>Viento: <29 km/h.</li>
                                <li>Granizo: Sin presencia.</li>
                            </ul>
                        </div>
                        <div class="col-6 order-4 col-sm-6 col-lg-6 col-xl-4 lista21">
                            <ul>
                                <li>Porta paraguas o impermeable.</li>
                                <li>Monitoreo</li>
                                <li>Emisión de Boletín meteorológico cada 24 hrs.</li>
                                <li>Notificación a los Sistemas Municipales de Protección Civil.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                    
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 order-2 col-sm-2 alertaA">
                            <span>Alerta Amarilla</span>
                        </div>
                        <div class="col-6 order-1 col-sm-1 imgAmarilla">
                            <img src="{{ asset('../images/actua/actuaMesadetrabajo51.png') }}">
                        </div>
                        <div class="col-6 order-3 col-sm-3 col-lg-3 col-xl-2 lista2">
                            <ul>
                                <li>Lluvia: 10 -29 mm/24h.</li>
                                <li>Viento: 30 - 49 km/h.</li>
                                <li>Granizo: Sin Pequeño.</li>
                            </ul>
                        </div>
                        <div class="col-6 order-4 col-sm-6 col-lg-6 col-xl-4 lista21">
                            <ul>
                                <li>Retira la basura de las coladeras del interior y exterior de tu hogar.</li>
                                <li>Comprobar los métodos de evacuación.</li>
                                <li>Las personas de la tercera edad y otras vulnerables deben refugiarse.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6 order-2 col-sm-2 alertaN">
                            <span>Alerta Naranja</span>
                        </div>
                        <div class="col-6 order-1 col-sm-1 imgNaranja">
                            <img src="{{ asset('../images/actua/actuaMesadetrabajo52.png') }}">
                        </div>
                        <div class="col-6 order-3 col-sm-3 col-lg-3 col-xl-2 lista2">
                            <ul>
                                <li>Lluvia: 30 -49 mm/24h.</li>
                                <li>Viento: 50 - 59 km/h.</li>
                                <li>Granizo: Mediano.</li>
                            </ul>
                        </div>
                        <div class="col-6 order-4 col-sm-6 col-lg-6 col-xl-4 lista21">
                            <ul>
                                <li>Guarda y retira objetos del exterior que puedan caer.</li>
                                <li>Deben tomarse todas las medidas necesarias para preservar la vida.</li>
                                <li>Alertamiento y monitoreo de zonas bajas y márgenes de ríos y arroyos.</li>
                                <li>Evacuaciones preventivas en zonas de alto riesgo.</li>
                                <li>Monitoreo permanente en zonas vulnerables.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6 order-2 col-sm-2 alertaR">
                            <span>Alerta Roja</span>
                        </div>
                        <div class="col-6 order-1 col-sm-1 imgRoja">
                            <img src="{{ asset('../images/actua/actuaMesadetrabajo53.png') }}">
                        </div>
                        <div class="col-6 order-3 col-sm-3 col-lg-3 col-xl-2 lista2">
                            <ul>
                                <li>Lluvia: 50 -70 mm/24h.</li>
                                <li>Viento: 60 - 69 km/h.</li>
                                <li>Granizo: Grande.</li>
                            </ul>
                        </div>
                        <div class="col-6 order-4 col-sm-6 col-lg-6 col-xl-4 lista21">
                            <ul>
                                <li>Desconecta la energía eléctrica.</li>
                                <li>Monitoreo permanente</li>
                                <li>Evacuaciones de zonas de riesgo, márgenes de ríos y arroyos y zonas bajas.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 ultimaLista">
                    <div class="row">
                        <div class="col-6 order-2 col-sm-2 alertaM">
                            <span>Alerta Morada</span>
                        </div>
                        <div class="col-6 order-1 col-sm-1 imgMorada">
                            <img src="{{ asset('../images/actua/actuaMesadetrabajo54.png') }}">
                        </div>
                        <div class="col-6 order-3 col-sm-3 col-lg-3 col-xl-2 lista2">
                            <ul>
                                <li>Lluvia: <70 mm/24h.</li>
                                <li>Viento: <70 km/h.</li>
                                <li>Granizo: Muy Grande.</li>
                            </ul>
                        </div>
                        <div class="col-6 order-4 col-sm-6 col-lg-6 col-xl-4 lista21">
                            <ul>
                                <li>Porta paraguas o impermeable.</li>
                                <li>Si existe un alertamiento de inundación o deslave, evacúa dando mayor atención a infantes con discapacidad o adultos mayores.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCION 4 SISMO --}}
    <div class="row seccion4">
        <div class="col-12 tituloSismo" id="sismo">
            <div class="row tituloSismo2">
                <div class="col-10">
                    <h3>Sismo</h3>
                </div>
                <div class="col-2 imgSismo">
                    <img src="{{ asset('images/actua/actuaMesadetrabajo40copia2.png') }}">
                </div>
                 <hr>
            </div>
            <div class="row sismoLista">
                <div class="col-12 offset-0 col-sm-12 offset-sm-0 col-lg-12 offset-lg-0 col-xl-8 offset-xl-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 lista3">
                            <ul>
                                <li>Si escuchas la alerta sísmica, cuentas con segundos de ventaja, úbicate en una zona de menor riesgo.</li><br>
                                <li>Es importante mantener la calma, ya que puedes provocar un accidente.</li><br>
                                <li>Aléjate de ventanas o muebles que pudieran caerse.</li><br>
                                <li>Si tienes bebés o infantes en el hogar ve por ellos y úbicate en alguna columna o muro de carga.</li><br>
                                <li>Si hay personas adultas mayores deben conocer cuáles son los sitios seguros del hogar para que puedan desplazarse a ellos desde donde se encuentran.</li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6 lista3">
                            <ul>
                                <li>En el caso de personas con discapacidad, los hogares deben contar con accesibilidad total: rampas, pasamanos, alertamientos especiales visuales y auditivos (luces intermitentes, alarma sísmica). Altura de picaportes, contactos, apagadores, botones de alarma adecuados a todas las necesidades.</li><br>
                                <li>Una vez perceptible el movimiento telúrico, no hagas caso de las escaleras ni el elevador.</li><br>
                                <li>Si cuentas con animal de compañia busca su jaula, pecera o correa.</li><br>
                                <li>En el caso de gatos, perros o algún otro que se encuentre libre, llámalo para evacuar o resguardarlo en la zona de mejor riesgo.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 tituloInmueble">
            <h4>¿Qué hacer si te quedas atrapado en un inmueble durante un sismo?</h4>
            <hr>
            <hr class="hr2">
            <div class="row">
                <div class="col-2 imgAtrapado">
                    <img src="{{ asset('images/actua/actuaMesadetrabajo49.png') }}">
                </div>
                <div class="col-12 col-sm-10 col-md-8 lista4">
                    <ul>
                        <li>Si escuchas la alerta sísmica, cuentas con segundos de ventaja, úbicate en una zona de menor riesgo.</li><br>
                        <li>Es importante mantener la calma, ya que puedes provocar un accidente.</li><br>
                        <li>Aléjate de ventanas o muebles que pudieran caerse.</li><br>
                        <li>Si tienes bebés o infantes en el hogar ve por ellos y úbicate en alguna columna o muro de carga.</li><br>
                        <li>Si hay personas adultas mayores deben conocer cuáles son los sitios seguros del hogar para que puedan desplazarse a ellos desde donde se encuentren.</li>
                    </ul>
                </div>
                <div class="col-2 Circulos">
                    <div class="col-2 circulo">
                        <span>En caso de sismo, las personas con algún tipo de discapacidad deben resguardarse en la zona de menor riesgo, pasado el fénomeno deberán evacuar el inmueble.</span>
                    </div>
                    <div class="circuloBajo"></div>
                </div>
                
            </div>
        </div>
    </div>

    {{-- SECCION 4 PREPARAR --}}
    <div class="row seccion5">
        <div class="col-12 tituloPreparo">
            <h2><strong>¿CÓMO ME</strong> PREPARO?</h2>
        </div>
        <div class="col-12 tituloBrigada" id="brigada">
            <div class="row">
                <div class="col-12 col-sm-10">
                    <h3>Brigada</h3>
                </div>
                <div class="col-2 imgBrigada">
                    <img src="{{ asset('images/actua/actuaMesadetrabajo40copia3.png') }}">
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 col-xl-4 parrafoBrigada">
                    <p>Si vives en un edificio, las o los vecinos, conjuntamente con la administración, deberán elaborar un Programa Interno de Protección Civil, identificando las zonas con menor riesgo al interior y exterior del inmueble, así como las rutas de evacuación.</p>
                    <p>Pueden confirmar brigadas de Protección Civil con distintas tareas cada brigadista.</p>
                    <p>La unidad de Protección Civil de tu Alcaldía los puede capacitar en la formación de brigadas, evacuación de primeros auxilios con distintas tareas cada brigadista.</p>
                </div>
                <div class="col-12 col-sm-12 col-lg-12 col-xl-8">
                    <div class="row filaChalecos">
                        <div class="col-4 col-sm-2 offset-sm-1 col-lg-2 offset-lg-1 col-xl-2 offset-xl-0 chaleco1">
                            <div>
                                <img src="{{ asset('images/actua/actuaMesadetrabajo56.png') }}">
                                <div>
                                    <span>BRIGADA DE REPLIEGUE Y EVACUACIÓN</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-2 chaleco2">
                            <div>
                                <img src="{{ asset('images/actua/actuaMesadetrabajo57.png') }}">
                                <div>
                                    <span>BRIGADA DE PRIMEROS AUXILIOS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-2 chaleco3">
                            <div>
                                <img src="{{ asset('images/actua/actuaMesadetrabajo57copia.png') }}">
                                <div>
                                    <span>COORDINADOR DE INMUEBLE Y/O JEFE DE PISO</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-2 chaleco4">
                            <div>
                                <img src="{{ asset('images/actua/actuaMesadetrabajo57copia2.png') }}">
                                <div>
                                    <span>BRIGADA DE PREVENCIÓN Y COMBATE DE INCENDIOS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-2 chaleco5">
                            <div>
                                <img src="{{ asset('images/actua/actuaMesadetrabajo57copia3.png') }}">
                                <div>
                                    <span>BRIGADA DE COMUNICACIÓN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 tituloSimulacro" id="simulacro">
            <div class="row">
                <div class="col-10">
                    <h3>Simulacro</h3>
                </div>
                <div class="col-2 imgMonito">
                    <img src="{{ asset('images/actua/actuaMesadetrabajo40copia4.png') }}">
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6 col-xl-5 textoSimulacro">
                    <p>Una vez que toda la familia conozca las ubicaciones de las zonas de menor riesgo, rutas de evacuación y cómo reaccionar en caso de emergencia, es necesario que realicen simulacros que les servirán para reforzar y mejorar los protocolos de actuación. A través de estos ejercicios, se pueden corregir los errores que comúnmente se comenten.</p><br>
                    <p><span>1.</span> Imagina una situación de emergencia (hipótesis) en tu hogar. ¿Qué harían tú y tu familia si sucediera?</p>
                    <p><span>2.</span> Fijen responsabiliades a cada integrante de la familia. Acuerden quien será responsable de:
                        <ul class="lista5">
                            <li>Verificar el botiquín.</li>
                            <li>Verificar el estado de la maleta de vida.</li>
                            <li>Asistir a las personas con discapacidad.</li>
                            <li>Proteger a los animales de compañia.</li>
                            <li>Identificar su lugar favorito para que puedas ubicarlo.</li>
                            <li>Cierra las llaves de gas, agua y luz.</li>
                            <li>Llevar consigo la maleta de vida.</li>
                            <li>Llamar a los Servicios de Emergencia.</li>
                            <li>Cuidar a infantes.</li>
                            <li>Ayudar a personas mayores.</li>
                        </ul>
                    </p>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-xl-5 textoSimulacro">
                    <p><span>3.</span> Ante los alertamientos, interrumpen cualquier actividad que estén realizando.</p>
                    <p><span>4.</span> Cierren las llaves de paso de agua, gas y corten el suministro eléctrico:
                        <ul class="lista6">
                            <li>Midan el tiempo que necesitan para llegar a los sitios seguros fuera del hogar, partiendo de diferentes lugares.</li>
                        </ul>
                    </p>
                    <p><span>5.</span> Recuerden siempre deben mantener la calma.</p>
                    <p><span>6.</span> Lleguen al punto de reunión acordado. Revisen que todos se encuentren bien.</p>
                    <p><span>7.</span> Evalúen los resultados y ajusten tiempos.</p>
                    <div class="textoSpan">
                        <span class="span1">Recuerden que para evacuar a grupos en condición de vulnerabilidad, principalmente infantes, personas con discapacidad o adultos mayores, se requiere más tiempo, por ellos debes considerar la ayuda que necesiten.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTON REGRESAR E IR ARRIBA --}}
    <div class="row">
        <div class="col-6">
            <div class="botonRegresar2">
                {{-- <button class="btn regresar2" onclick="irInicio()">Regresar</button>--}}
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
    // funcion cargar circulo
    $(document).ready(function(){
        var el = document.getElementById('graph'); // get canvas

        var options = {
            percent:  el.getAttribute('data-percent') || 25,
            size: el.getAttribute('data-size') || 220,
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

<script>
    var element = document.getElementById("divIncendio");
    var element2 = document.getElementById("divInundacion");
    var element3 = document.getElementById("divSismo");
    var element4 = document.getElementById("divBrigada");
    var element5 = document.getElementById("divSimulacro");

    function cambioImagen(){
        element.classList.remove('divCirculo');
        element.classList.add('divCirculoLleno');

        element2.classList.remove('divCirculoLleno');
        element2.classList.add('divCirculo');

        element3.classList.remove('divCirculoLleno');
        element3.classList.add('divCirculo');

        element4.classList.remove('divCirculoLleno');
        element4.classList.add('divCirculo');

        element5.classList.remove('divCirculoLleno');
        element5.classList.add('divCirculo');
    }
    function cambioImagen2(){
        element2.classList.remove('divCirculo');
        element2.classList.add('divCirculoLleno');

        element.classList.remove('divCirculoLleno');
        element.classList.add('divCirculo');

        element3.classList.remove('divCirculoLleno');
        element3.classList.add('divCirculo');

        element4.classList.remove('divCirculoLleno');
        element4.classList.add('divCirculo');

        element5.classList.remove('divCirculoLleno');
        element5.classList.add('divCirculo');
    }
    function cambioImagen3(){
        element3.classList.remove('divCirculo');
        element3.classList.add('divCirculoLleno');

        element.classList.remove('divCirculoLleno');
        element.classList.add('divCirculo');

        element2.classList.remove('divCirculoLleno');
        element2.classList.add('divCirculo');

        element4.classList.remove('divCirculoLleno');
        element4.classList.add('divCirculo');

        element5.classList.remove('divCirculoLleno');
        element5.classList.add('divCirculo');
    }
    function cambioImagen4(){
        element4.classList.remove('divCirculo');
        element4.classList.add('divCirculoLleno');

        element.classList.remove('divCirculoLleno');
        element.classList.add('divCirculo');

        element2.classList.remove('divCirculoLleno');
        element2.classList.add('divCirculo');

        element3.classList.remove('divCirculoLleno');
        element3.classList.add('divCirculo');

        element5.classList.remove('divCirculoLleno');
        element5.classList.add('divCirculo');
    }
    function cambioImagen5(){
        element5.classList.remove('divCirculo');
        element5.classList.add('divCirculoLleno');

        element.classList.remove('divCirculoLleno');
        element.classList.add('divCirculo');

        element2.classList.remove('divCirculoLleno');
        element2.classList.add('divCirculo');

        element3.classList.remove('divCirculoLleno');
        element3.classList.add('divCirculo');

        element4.classList.remove('divCirculoLleno');
        element4.classList.add('divCirculo');
    }
</script>

@endsection