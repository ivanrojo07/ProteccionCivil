<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}" />
        <title>@yield('titulo')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layoutBaseS.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/global-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/jquery-ui.1.12.1.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset ('css/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        @yield('estilos')
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/btns-toggle.js') }}"></script>
        {{--<script type="text/javascript" src="{{ asset('js/dropdown.js') }}"></script>--}}
        {{--@if(session('ImagenPerfil')=='NO')--}}
        <script type="text/javascript" src="{{ asset('js/nombreContacto.js') }}"></script>
        {{--@endif--}}
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe5gzNGneaWmWLzmZs6bFKNlwdCTr0Odk"></script>
        <script type="text/javascript" src="{{ asset('js/ubicacion.js') }}"></script>
        {{--<script type="text/javascript" src="{{ asset('js/headerComercial.js') }}"></script>--}}
        {{--<script type="text/javascript">
            var nombreUsuario = "{{ session('nombreCompleto') }}";
            var menuPrincipal  = @json(Session('menulateral'));
            var tokenUsuario360 ="{{ php echo session('tokenUsuario360');  }}";
            var idUsuario360 = "{{ php echo session('idUsuario360');  }}";
        </script>
        <script type="text/javascript" src="{{ asset('js/menuLateral.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/tokenSolicitud.js') }}"></script>--}}
        <script type="text/javascript" src="{{ asset('js/vendor/jquery-ui.1.12.1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sweetalert2@8.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/controlmodal.js') }}"></script>
        <script type="text/javascript">
            var rutaApp = '{!! url('/') !!}' + '/';
        </script>
        <script type="text/javascript">
            function irPlanFamiliar(){
                window.location= rutaApp+'planfamiliar';
            }
            function irPlanActua(){
                window.location= rutaApp+'planactua';
            }
        </script>
        @yield('scripts')
    </head>
    <body>        
        <header class="segmento">
            <div class="cabezera header1">
                <a href="https://claro360.com/plataforma360/home"></a>
                <div class="col-12 row m-0 p-0 headEmpresa">
                    <div class="col-6 txtlogo" id="txtlogoE">
                        <h6 id="nomEmpresa"></h6>
                    </div>
                    <div class="col-6 imgEmpresa" id="logoEmpresa">
                    </div>
                    <div class="col-6 img360" id="logoN360">
                    </div>
                </div>
            </div>
            <div class="cabezera header2">
                <ul id="menuResponsivo" class="menu menuResponsivo">
                    <li class="segmentosV" id="hdrinicio">
                        <a onclick="solicitudToken('https://claro360.com/plataforma360/','/home')" href="#">360</a>
                    </li>
                    <li class="segmentos" id="hdrpersona">
                        <a onclick="solicitudToken('https://claro360.com/plataforma360/','/persona')" href="#">Persona</a>
                    </li>
                    <li class="segmentos" id="hdrempresa">
                        <a onclick="solicitudToken('https://claro360.com/plataforma360/','/empresa')" href="#">Empresa</a>
                    </li>
                    <li class="segmentos" id="hdrcorporativo">
                        <a onclick="solicitudToken('https://claro360.com/plataforma360/','/corporativo')" href="#">Corporativo</a>
                    </li>
                    <li class="segmentos" id="hdrgobierno">
                        <a onclick="solicitudToken('https://claro360.com/plataforma360/','/gobierno')" href="#">Gobierno</a>
                    </li>
                    <li class="segmentosV" id="hdrapp">
                        <a onclick="solicitudToken('https://claro360.com/plataforma360/','/app')" target="_self" href="#">Store 360</a>
                    </li>
                </ul>
                <div class="Cont_proyect_titles">
                    <div class=" m-0 proyect_titles" style="">
                        <div class="proyect_title_top" id="T1Header">{{--Nombre plataforma--}}</div>
                        <div class="proyect_title_bot" id="T2Header">{{--Sucursal, goierno, corporativo--}}</div>
                    </div>
                </div>
                <div class="header-tituloSegmento">
                    <p id="lComercial"></p>
                </div>
            </div>
            <div class="col h-100 header3 unlogged">
                <div class="containerHeader4">
                    <span class="fas fa-th iconServicios" id="iconServ"></span>
                    <span id="NombreDependencia" align="right"></span>
                    <span id="user">{{ session('nombreusuario') }}</span>
                    <span id="tipoSegmento"></span>
                    <span id="t4" style="display: none;"></span>
                    <button id="btn-abrir">
                        <span class="glbl glbl-menu"></span>
                    </button>
                    <button id="btn-cerrar">
                        <span class="glbl glbl-close"></span>
                    </button>
                </div>
            </div>
            {{--<div class="cabezera header3">
                <!-- <a class="btn btn-danger btn-registrate" href="/registro">Regístrate</a>
                <a class="btn btn-danger btn-ingresa" href="/logeo">Ingresa</a> -->
            </div>--}}
        </header>
  
        <div id="menuServicios" class="menuServicios segmento">
            @include('claro360.modulos')
            <div id="servicios" class="row col-12 m-0 p-2">
                {{--@for ($i = 0; $i < count($atributosUsuario); $i++)
                    @if(session($atributosUsuario[$i]))
                        <div class="col-4 p-2" onclick="solicitudToken('{{ session($atributosUsuario[$i]) }}')">
                        <div class="service" style="background-image: url('{{ session('Icono'.$atributosUsuario[$i]) }}');"></div>
                        <div class="service_label">{{session('Alias'.$atributosUsuario[$i])}}</div>
                        </div>
                    @endif
                @endfor
                @if(session('CuantasPlataforma'))
                    {{session('Plataforma360'.$i)}}
                    @for ($i = 0; $i < $CuantasPlataforma; $i++)
                        <div class="col-4 p-2" onclick="solicitudToken('{{session('Plataforma360'.$i)}}')">
                            <div class="service" style="background-image: url('{{session('Plataforma360icono'.$i)}}');">
                            </div>
                            <div class="service_label">{{session('Plataforma360Nom'.$i)}}</div>
                        </div>
                    @endfor
                @endif--}}
                <div class="col-4 p-2">
                    <div class="service" style="background-image: url(https://empresas.claro360.com/p360_v4.2/Img/iconoheader/Planos.png);">
                    </div>
                    <div class="service_label">Servicio</div>
                </div>
            </div>
            <div class="expanded_menu">
                <svg class="svg-inline--fa fa-chevron-up fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg><!-- <i class="fas fa-chevron-up"></i> Font Awesome fontawesome.com -->
            </div>
            <div class="expand_menu">Ver más</div>
        </div>
        <div id="menuServiciosComerciales" class="menuServicios segmento">
            <ul id="ulhdrpersona" class="servicios d-none">
                <li>
                    <a href="#">
                        <div class="text-center"><img src="https://claro360.com/plataforma360/resources/local_v3.1/images/iconosHeader/persona/40/Hogar_Conectado-Persona_40X40.png"></div>
                        <label for="">Hogar Conectado</label>
                    </a>
                </li>
            </ul>
            <ul id="ulhdrempresa" class="servicios d-none">
                <li>
                    <a href="#">
                        <div class="text-center"><img src="https://claro360.com/plataforma360/resources/local_v3.1/images/iconosHeader/empresa/40/Empresa360-Empresa_40X40.png"></div>
                        <label for="">Empresa 360</label>
                    </a>
                </li>
            </ul>
            <ul id="ulhdrcorporativo" class="servicios d-none">
                <li>
                    <a href="#">
                        <div class="text-center"><img src="https://claro360.com/plataforma360/resources/local_v3.1/images/iconosHeader/corporativo/40/Empresa360-Corporativo_40X40.png"></div>
                        <label for="">Corporativo 360</label>
                    </a>
                </li>
            </ul>
            <ul id="ulhdrgobierno" class="servicios d-none">
                <li>
                    <a href="#">
                        <div><img src="https://claro360.com/plataforma360/resources/local_v3.1/images/iconosHeader/gobierno/40/Videovigilancia-Gobierno_40X40.png"></div>
                        <label for="">Videovigilancia</label>
                    </a>
                </li>
            </ul>
        </div>
        
        <address class="cerrarSesion" id="ventanaSesion">
            <div class="contSesion">
                <div class="perfil">
                    <div class="foto">
                        {{--@if(session('ImagenPerfil')!='NO')--}}
                        <div class="foto-perfil d-flex justify-content-center align-content-center" id="img_perfil_user" style="background-image: url(http://empresas.claro360.com/p360_v4.2/images/base/Claro360_Logo_Header_negro.png);"></div>
                        {{--@else--}}
                        <div class="fotodef"></div>
                        {{--@endif--}}
                    </div>
                    <div class="datos">
                        <div class="info row">
                            <h6 class="nombre col-12">{{--{{ session('nombreusuario') }}--}}Nombre Completo Usuario</h6>
                            <p class="correo col-12">{{--{{ session('correousuario') }}--}}correousuario@ejemplo.com </p>
                            <p class="ubicacion col-7" id="ubicacion">Ubicacion del Usuario</p>
                            <p class="semaforo col-5 row">
                                <span class="" id="semaforo">Semaforo: Naranja</span>
                                <span class="colorS" id="colorsemaforo"></span>
                            </p>
                            {{--@if(session('logoEmpresa')!='NO')--}}
                            <p class="lempresa col-7">
                                <img src="https://lineamientos.s3.amazonaws.com/Logotipos/119global%204%404x-100.jpg{{--{{ session('logoEmpresa') }}--}}">
                            </p>
                            {{--@else--}}
                            {{--@if(session('nombreEmpresa')!='NO')--}}
                            <p class="empresa col-7">{{--{{ session('nombreEmpresa') }}--}}Nombre Empresa</p>
                            {{---@endif
                            @endif--}}
                            {{--@if(session('sucursalEmpresa')!='NO')--}}
                            <p class="sucursal col-5">{{--{{ session('sucursalEmpresa') }}--}}Sucursal</p>
                            {{--@endif--}}
                            <div class="btn-perfil">
                                <a class="boton-perfil" href="#">Mi Perfil 360</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navegacion">
                    <nav>
                        <ul class="menu-sesion">
                            <li class="" data-toggle="collapse" href="#collapseServicios" role="button" aria-expanded="false" aria-controls="collapseServicios" id="pcollapseServicios">MIS SERVICIOS</li>
                            <div class="menu-servicios collapse" id="collapseServicios">
                                {{--@for ($i = 0; $i < count($atributosUsuario); $i++)
                                @if(session($atributosUsuario[$i]))
                                <div class="nservice p-2" onclick="solicitudToken('{{ session($atributosUsuario[$i]) }}')">
                                    <div class="service" style="background-image: url('{{ session('Icono'.$atributosUsuario[$i]) }}');"></div>
                                    <div class="service_label">{{session('Alias'.$atributosUsuario[$i])}}</div>
                                </div>
                                @endif
                                @endfor
                                @if(session('CuantasPlataforma'))
                                @for ($i = 0; $i < $CuantasPlataforma; $i++)
                                <div class="nservice p-2" onclick="solicitudToken('{{session('Plataforma360'.$i)}}')">
                                    <div class="service" style="background-image: url('{{session('Plataforma360icono'.$i)}}');">
                                    </div>
                                    <div class="service_label">{{session('Plataforma360Nom'.$i)}}</div>
                                </div>
                                @endfor
                                @endif--}}
                                <div class="nservice p-2">
                                    <div class="service" style="background-image: url(https://empresas.claro360.com/p360_v4.2/Img/iconoheader/Planos.png);">
                                    </div>
                                    <div class="service_label">Service Label</div>
                                </div>
                            </div>
                            <li><a href="#">Canjear Código 360</a></li>
                            <li class="" id="pcollapseSegmentos" data-toggle="collapse" href="#collapseSegmentos" role="button" aria-expanded="false" aria-controls="collapseSegmentos">360</li>
                            <ul class="menu-segmentos collapse" id="collapseSegmentos">
                                <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/persona')">Persona</a></li>
                                <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/empresa')">Empresa</a></li>
                                <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/corporativo')">Corporativo</a></li>
                                <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/gobierno')">Gobierno</a></li>
                            </ul>
                            <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/app')">Store 360</a></li>
                            {{--<li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/app')">Soporte</a></li>--}}
                            <li class="" id="pcollapseLegal" data-toggle="collapse" href="#collapseLegal" role="button" aria-expanded="false" aria-controls="collapseLegal">Legal</li>
                            <ul class="menu-segmentos collapse" id="collapseLegal">
                                <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/terminos_y_condiciones')">Términos y Condiciones</a></li>
                                <li><a href="#" onclick="solicitudToken('https://claro360.com/plataforma360/','/aviso_privacidad')">Politica de Privacidad</a></li>
                            </ul>
                            {{--@if (Session::get('tipo_usuario') == 0)
                            <li><a class="dropdown-item" href="{{ url('/administrador') }}">Opciones avanzadas</a></li>
                            @endif--}}
                        </ul>
                        <div class="row col-12 m-0 p-0 mt-5">
                            <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                                <img src="http://empresas.claro360.com/p360_v4.2/images/base/Claro360_Logo_Header_negro.png">
                            </div>
                            <div class="col-12 m-0 mt-4">
                                <label class="w-100 text-center text-secondary" style="font-size: 14px;">¿Tienes alguna duda? Escríbenos
                                </label>
                                <label class="w-100 text-center text-secondary font-weight-bold" style="font-size: 13px;">contacto@claro360.com
                                </label>
                            </div>
                        </div>                        
                    </nav>
                </div>
            </div>
        </address>
        <section>
            <main id="main">
                <div class="contenedor">
                    @yield('contenido')
                </div>
            </main>
            <aside id="sidebar" >
                <div class="boton-ocultar" id="ocultarSidebar">
                    <p class="icono" >
                        <i class="fas fa-ellipsis-v" id="btnOcultarSidebar"></i>              
                    </p>
                    <p class="texto" id="parrafoOcultar">Menú</p>
                </div>
                <div class="contraer-items" id="contraerItems">
                    <input type="checkbox" id="cbox1"><label>Contraer Menú</label>
                </div>
                <div class="contenidoMenu menuInactivo" id="contenido">
                </div>        
            </aside>
            {{--<div class="menu-secundario" id="menuSecundario">
                <div class="tituloMSecundario">
                    <label>Servicios @yield('titulopanel')</label>
                    <i class="fas fa-chevron-up togglecerrarM-secundario" id="toggleMSecundario"></i>
                </div>
                <div>
                    @yield('panellateral')
                </div>
            </div>--}}
            {{--<div class="chat">
                <div class="btn-chat" id="chat-btn">
                    <span class="glbl glbl-chatpyme"></span>
                    <span class="titulo-chat">CHAT</span>
                </div>
                <div class="soluciones" id="soluciones-btn">
                    <a href="/chat" target="popup" onClick="javascript:window.open(this.href, this.target, 'toolbar=0 , location=1 , status=0 , menubar=1 , scrollbars=0 , resizable=1 ,left=0px,top=150px,width=400px,height=600px'); return false;">
                        <span class="titulo">Centro de Soluciones 360</span>
                        <br>
                        <span class="sub-titulo">Inicie Comunicación</span>
                    </a>
                </div>
            </div>--}}
        </section>
        <footer>
            <div class="texto"><h6>© 360 HQ S.A de C.V 2019. Todos los derechos reservados.</h6></div>
            <div class="logo"><img src="/images/claro2min.png" alt="claro-360"></div>
        </footer>

        {{-- <script type="text/javascript" src="{{ asset('js/vendor/jquery-3.2.1.slim.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('js/vendor/popper-1.12.9.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
        
        {{-- <script type="text/javascript" src="{{ asset('js/btns-toggle.js') }}"></script> --}}
        
        {{--* Configuracion de script date piker en español* Configuracion de la ruta de la aplicacion --}}
        <script type="text/javascript">
          var rutaApp = "{!! url('/') !!}" + "/";
          $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd-mm-yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
           };
           $.datepicker.setDefaults($.datepicker.regional['es']);
        </script>
        <!--script>alert('El ancho de la resolucion de pantalla es de '+screen.width+' pixeles. '+' El alto de la resolucion de pantalla es de '+screen.height+' pixeles');</script-->
        
        <script>
            $(function(){
                var prevscrll=$("#contenidor").scrollTop();
                var div_padre = $("#contenidor").height();
                //console.log("DIIIIIIIIIV PADREEEE       "+div_padre);
                var div_hijo = $("#contenido").outerHeight();
                //console.log("DIIIIIIIIIV HIJOOOOO       "+div_hijo);
                if (div_hijo < div_padre){
                    document.getElementById("navbar").style.visibility="visible";
                }
                //console.log(prevscrll);
                $("#contenidor").scroll(function(){
                    var nextscrll=$("#contenidor").scrollTop();
                    //console.log(nextscrll);
                    if(prevscrll > nextscrll){
                        document.getElementById("navbar").style.visibility="visible";
                    }else{
                        document.getElementById("navbar").style.visibility="hidden";
                    }
                    prevscrll=nextscrll;
                    //console.log(prevscrll);
                    /*if(prevscrll == 0){
                        document.getElementById("navbar").style.visibility="hidden";
                    }*/
                });
            });
        </script>        
    </body>
</html>