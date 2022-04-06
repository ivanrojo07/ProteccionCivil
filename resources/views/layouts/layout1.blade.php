<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  {{--   <meta http-equiv="Expires" content="0" />
     <meta http-equiv="Pragma" content="no-cache" /> --}}

     {{-- <script type="text/javascript">
       if(history.forward(1)){
         location.replace( history.forward(1) );
       }
     </script> --}}
    <link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}" />
    <title>@yield('titulo')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/normalizev8.0.0.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/jquery-ui.1.12.1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset ('css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    @yield('estilos')
  </head>
  <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
      <section id="page">
    @section('cabecera')
      <header class="cabecera"style="max-width:auto">
        <div class="row">
          @if (Session::has('nombreusuario'))
          <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
            {{--<a href="{{ url('/') }}" title="Login">
            </a>--}}
              <img src="{{ asset('images/Claro360logo-03.png') }}" class="img-fluid" alt="claro-360">
          </div>

          <div class="col-5 col-sm-5 col-md-6 col-lg-6 col-xl-6">
            <!--img src="{{ asset('images/logo_Sanborns2.png') }}"  class="img-fluid" alt="Sanborns" style="min-width:95px;height:55px;float:right;padding:5px" m-->
          </div>

          <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 text-center" style="padding-left:5px">
            {{--<div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Opciones" style="float:center">
              <!--img src="{{ asset('images/open-iconic-master/png/person-6x.png') }}" style="width: 40px;" a-->
                <span class="glbl glbl-menu" style="background-color: #ffffff; border: 6px solid #ffffff; color: #000;"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesión</a>
              </div>
            </div>--}}
          </div>
          @else
          <div class="col-6">
            {{--<a href="{{ url('/') }}" title="Login">
            </a>--}}
              <img src="{{ asset('images/Claro360logo-03.png') }}" class="img-fluid" alt="claro-360">
          </div>
          <div class="col-6" style="float:right">
            <!--img src="{{ asset('images/logo_Sanborns2.png') }}" class="img-fluid" alt="Sanborns" style="float:right"r-->
          </div>
          @endif
        </div>
        @yield('menu')
      </header>
    @show
    <main>
    {{-- Contenido General de cada vista  --}}
    <div class="container-fluid contenido">
      @yield('contenido')
    </div>

    <!-- /.modal de Mensajes -->
  <div class="modal fade" id="modalMensajes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mensaje:</h5>
        </div><!-- /.modal-headeri -->
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <span aria-hidden="true"></span>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <h4 id="mensaje">Hola Mundo</h4>
            </div>
          </div>
        </div><!-- /.modal-body -->
        <div class="modal-footer">
        </div><!-- /.modal-footer -->
      </div><!-- /.modal-contente -->
    </div><!-- /.modal-dialogl -->
  </div><!-- /.modala -->
</main>
</section >
    <script type="text/javascript" src="{{ asset('js/vendor/jquery-3.2.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/popper-1.12.9.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/jquery-ui.1.12.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert2@8.js') }}"></script>
    @include('sweet::alert')
    {{--
      * Configuracion de script date piker en español
      * Configuracion de la ruta de la aplicacion --}}
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

    <script type="text/javascript">
      var iplocal=" {{ Session::get('iplocal') }}";
     // console.log("ip local");
     // console.log("ip de consulta=="+iplocal);
     // $("#modalMensajes").modal('show');
    </script>
    <script type="text/javascript">
      var rutaApp = '{!! url('/') !!}' + '/';
    </script>
    <!--script>alert('El ancho de la resolucion de pantalla es de '+screen.width+' pixeles. '+' El alto de la resolucion de pantalla es de '+screen.height+' pixeles');</script-->

      {{--@php
      $ip =  substr(Session::get('iplocal'), 0, 6);
     // echo $ip;
      @endphp
      @if(Session::get('iplocal')=='187.237.42.198' || Session::get('iplocal')=='187.237.42.201' || Session::get('iplocal')=='::1' || $ip =='172.17' || $ip =='172.19')
         <script type="text/javascript" src="{{ asset('js/config-srvr-video.js') }}"></script>
      @else
        <script type="text/javascript" src="{{ asset('js/config-srvr-videoexteno.js') }}"></script>

      @endif--}}

    @yield('scripts')
  </body>
</html>
