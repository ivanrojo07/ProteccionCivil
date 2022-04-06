@extends('layouts.layout2')
@section('titulo','Plan Familiar')
@section('estilos')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inicio.css') }}">
@endsection
@section('menu')
    <div class="row"  style="display: none;">
        <a href="{{ url('/') }}" class="active">Inicio</a>
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
<!--***********************************************************************************************************-->
<div class="container-fluid">
    
   <!--Sección Inicial-->
    <div class="row seccion1">
        <div class="imagen col-12">
                <div class="botonRegistra" id="botonplanF">
                    <span class="texto1">Comenzar</span>
                    <h1 class="texto2">MI PLAN FAMILIAR</h1>
                   <button class="btn" onclick="registraFamiliar()">¡Inicia Ya!</button>
                </div>
        </div>
        <div class="col-12 descripcion">
            <p>Nuestro planeta es un ente vivo que experimenta constantes cambios, así mismo las características geográficas y climáticas de nuestro país representan distintos riesgos para las familias y sus integrantes, debido al tipo de construcción en el que habiten, el terreno sobre el que se encuentren y las características de la ciudad en la que habitan.</p><br>
            <p>Por ello los ciudadanos debemos tomar conciencia sobre la importancia de estar preparados ante los efectos provocados por fenómenos naturales o por el hombre, contar con una estrategia familiar puede evitar o disminuir el riesgo si todos los integrantes de tu familia lo conocen y son parte de él.</p><br>
            <p>Tómate unos minutos para elaborar tu Plan Familiar, invita a todos los miembros de tu familia para que juntos realicen el plan que será de mucha utilidad para el cuidado de todos.</p>            
        </div>
    </div>
   {{--  <div class="row">
        <div class="chart" id="graph" data-percent="{{$user->progress_bar}}"></div>
    </div> --}}
    
    <!--Sección Barra de Progreso-->
    <div class="row seccion2 barraProgreso">
        {{-- BARRA DE PROGRESO --}}
        @include('inicio.progress', ['user' => $user])
        {{-- FIN BARRA DE PROGRESO --}}
    </div>

    <!--Sección Plan Familiar-->
    <div class="row seccion3">
        <div class="col-12">
            <div class="col-12 planFamiliar">
                <span>¿Qué es mi <h1>PLAN FAMILIAR?</h1></span>
                <h3 class="plan2">¿Qué es mi PLAN FAMILIAR?</h3>
                <p class="descripcionPlan">
                    Es un plan estratégico que te ayudará a conocer, prevenir, reducir y controlar los peligros generados por una emergencia o desastre. El contar con un Plan Familiar elaborado y comprendido por todos los integrantes de tu familia les permitirá saber qué hacer en caso de emergencia y actuar efectivamente en caso de que sea necesario.
                </p>
            </div>
        </div>
        <div class="col-12 elaborar">
            <hr>
            <div class="row">
                <div class="col-6 col-sm-12 col-md-12 col-lg-6 tituloFamiliar">
                    <div class="col-12 necesito">
                        <span>¿Qué necesito para elaborar mi </span>
                        <h3 class="necesito2">¿Qué necesito para elaborar mi PLAN FAMILIAR?</h3>
                    </div>
                    <div class="col-12">
                        <h1>PLAN FAMILIAR?</h1>
                    </div>
                </div>
                <div class="col-6 col-sm-12 col-md-12 col-lg-6 descripcion2">
                    <p>Hemos preparado una guía que facilitará iniciar tu plan e involucrar a los miembros de tu familia para que en familia puedan elaborar su estrategia, es muy importante que actualices la información capturada en este plan cada vez que sea necesario.</p><br>
                    <p>Contamos con algunas recomendaciones muy valiosas para elaborar paquetes de insumos que podrían ser la diferencia en caso de emergencia como lo son la Maleta de Vida y un Botiquín de Primeros Auxilios.</p><br>
                    <p>Además de recomendaciones para actuar ante emergencias concretas y para asignar actividades para en familia vigilar de todos.</p>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-12 pasosFamiliar">
            <span>Sigue estos pasos, tú y tu familia estarán preparados con su <b>Plan Familiar</b></span>
        </div>
        <div class="col-12 PasosPlan">
            <div class="row">
                <div class="col-4 planIndividual">
                    <div class="row">
                        <div class="col-4 imgPasos">
                            <img src="{{ asset('images/icono1.png') }}">
                        </div>
                        <div class="col-8 col-sm-12 col-md-8 textoicono">
                            <h3>Mi Familia</h3>
                            <p>Inicia creando tu ficha de seguridad, las de los integrantes de tu familia y de los animales de compañia que habitan en tu hogar, llévala siempre contigo.</p><br>
                            <div class="enlaceMas">
                                <a href="#">Ver más ></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 planIndividual">
                    <div class="row">
                        <div class="col-4 imgPasos">
                            <img src="{{ asset('images/icono2.png') }}">
                        </div>
                        <div class="col-8 col-sm-12 col-md-8 textoicono">
                            <h3>Mi Plan Familiar</h3>
                            <p>Crea una estrategia en familia, estar preparados ante cualquier emergencia es la mejor herramienta de prevención y seguridad para todos.</p><br>
                            <div class="enlaceMas">
                                <a href="#">Ver más ></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 planIndividual">
                    <div class="row">
                        <div class="col-4 imgPasos">
                            <img src="{{ asset('images/icono3.png') }}">
                        </div>
                        <div class="col-8 col-sm-12 col-md-8 textoicono">
                            <h3>Actúa</h3>
                            <p>En caso que se presente alguna amenaza, debes estar preparado para actuar dependiendo el tipo de eventualidad.</p><br>
                            <div class="enlaceMas ultimoEnlace">
                                <a href="#">Ver más ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Seccion Mi Familia-->
    <div class="row seccion4">
        <div class="col-6 familiaTitulo">
            <h1>Mi Familia</h1>
            <hr>
            <p>El componente más importante de tu estrategia son los miembros de tu familia así como tus animales de compañía, por ello <b>es importante que cada uno cuente con su Ficha de Seguridad y la lleve a todos lados.</b></p>
            <button class="btn btn-danger">Ir <i class="fas fa-angle-right"></i></button>
        </div>
        <div class="col-6 familiaImagen">
            <img class="img1" src="{{ asset('images/PlanFamiliar1.jpg') }}" alt="Mi Familia">
        </div>
    </div>

    <!--Sección Mi plan Familiar y Actua-->
    <div class="row seccion5">
        <div class="col-6 planImagen">
            <img class="img2" src=" {{ asset('images/PlanFamiliar2.png') }}" alt="Mi Plan Familiar">
        </div>
        <div class="col-6 miPlan">
            <h1>Mi Plan Familiar</h1>
            <hr>
            <p>La prevención es la mejor alternativa para reducir riesgos, <b>es importante tengas en cuenta las revisiones frecuentes que deben realizarse a las distintas instalaciones ubicadas al interior de tu casa, así como tomar en cuenta instalaciones al exterior o en la periferia de tu casa,</b> esto reducirá el riesgo de accidentes que afecten a miembros de tu familia o animales de compañía.</p>
            <button class="btn btn-danger" onclick="irPlanFamiliar()">Ir <i class="fas fa-angle-right"></i></button>
        </div>

        <div class="col-6 actuaTitulo">
            <h1>Actúa</h1>
            <hr>
            <p>Infórmense sobre los riesgos relacionados a distintas emergencias y cómo reaccionar ante ellas;así mismo, <b>comprendan la importancia de realizar simulacros y acordar en familia las responsabildades durante una emergencia, practiquen y estén preparados.</b></p>
            <button class="btn btn-danger" onclick="irPlanActua()">Ir ></button>
        </div>
        <div class="col-6 actuaImagen">
            <img class="img3" src=" {{ asset('images/PlanFamiliar3.jpg') }}">
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">

	function registraFamiliar(){
		window.location= rutaApp+'datos_generales';
	}
	function registrados(){
		window.location= rutaApp+'dashboard';
	}

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
@endsection