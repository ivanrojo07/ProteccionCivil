//Este archivo es para el funcionamiento de los botones del layoutBase
jQuery(document).ready(function($) {
	const menuHamburguesa = $('#ventanaSesion');
	const btnAbrirMenuH = $('#btn-abrir');
	const btnCerrarMenuH = $('#btn-cerrar');
	const btnChat = $('#chat-btn');
	const btnSoluciones = $('#soluciones-btn');
	const menuServicios = $('#menuServicios');
	const ocultarMenuPrincipal = $('#ocultarSidebar');
	const btnOcultarMenuPrincipal = $('#btnOcultarSidebar');/*..*/
	const menuPrincipal = $('#sidebar');
	const contenidoMenuPrincipal = $('#contenido');
	const parrafoOcultar = $('#parrafoOcultar');
	const iconoMenu = $('.fas');
	const main = $('#main');
	const menuSecundario = $('#menuSecundario');
	const btnResponsivoMenuSec = $('#toggleMSecundario');
	const check = $('#cbox1');
	check.click(function() {
		if (check.is(':checked')) {
			$('.dropdown-container.collapse.show').removeClass('show');
			$('.titulo.dropdown-btn').addClass('collapsed');
			check.prop('checked',false);
		}else{
			$('.dropdown-container.collapse').addClass('show');
			$('.titulo.dropdown-btn').removeClass('collapsed');
		}
	});
	//mostrar Menu Principal (Plegable)
	btnOcultarMenuPrincipal.click(function(){
	    if (screen.width >= 1151) {
			menuPrincipal.toggleClass("asideActive");
			ocultarMenuPrincipal.toggleClass("boton-ocultarActive");
			parrafoOcultar.toggleClass("pActive");
			iconoMenu.toggleClass("fasActive");
			contenidoMenuPrincipal.toggleClass("contenidoMenuActive");
			main.toggleClass("mainActive");
			menuSecundario.removeClass('desplazarMenu');
			if (menuSecundario.hasClass('menu-secundarioActive')) {
				menuSecundario.removeClass('desplazarMenu');
			}
			if (menuPrincipal.hasClass('asideActive')) {
				menuSecundario.addClass('desplazarMenu');
			}
	    }
	    if (screen.width < 1151) {
			menuPrincipal.toggleClass("asideActive");
			ocultarMenuPrincipal.toggleClass("boton-ocultarActive");
			parrafoOcultar.toggleClass("pActive");
			iconoMenu.toggleClass("fasActive");
			contenidoMenuPrincipal.toggleClass("contenidoMenuActive");
	    	if (menuPrincipal.hasClass('asideActive')) {
				menuSecundario.removeClass('menu-secundarioActive');
			}
	    }
	    menuHamburguesa.removeClass("cerrarAncho");
	    btnCerrarMenuH.hide();
		btnAbrirMenuH.show();
	});
	//mostrar y ocultar el menu secundario con el icono en Responsive 
	btnResponsivoMenuSec.click(function(event) {
		menuSecundario.toggleClass('menu-secundarioActive');
		menuPrincipal.removeClass('asideActive');
		ocultarMenuPrincipal.removeClass("boton-ocultarActive");
		parrafoOcultar.removeClass("pActive");
		contenidoMenuPrincipal.removeClass("contenidoMenuActive");
		menuSecundario.removeClass('desplazarMenu');
		menuHamburguesa.removeClass("cerrarAncho");
	    btnCerrarMenuH.hide();
		btnAbrirMenuH.show();
	});
	//Aqui siempre se mantiene oculto el boton de cerrar
	btnCerrarMenuH.hide();
	//Botones para abrir y cerrar la ventana de congtacto y cierre de sesión (Menu Hamburguesa)
	btnAbrirMenuH.click(function(){
		menuHamburguesa.addClass("cerrarAncho");
		btnAbrirMenuH.hide();
		btnCerrarMenuH.show();
		menuPrincipal.removeClass('asideActive');
		ocultarMenuPrincipal.removeClass("boton-ocultarActive");
		parrafoOcultar.removeClass("pActive");
		contenidoMenuPrincipal.removeClass("contenidoMenuActive");
		menuSecundario.removeClass('desplazarMenu');
		menuSecundario.removeClass('menu-secundarioActive');
		main.removeClass('mainActive');
		//Si la vetana de contacto esta activo esconde el sidebar solo en tamaño responsivo
		if (screen.width < 1200) {
		}
		document.getElementById("menuServicios").style.height="0px";
        document.getElementById("menuServicios").style.display="none";
	});
	btnCerrarMenuH.click(function() {
		menuHamburguesa.removeClass("cerrarAncho");
		btnCerrarMenuH.hide();
		btnAbrirMenuH.show();
	});
	//Efecto del boton del chat
	btnChat.click(function() {
		btnSoluciones.toggleClass("solucionesActive");
	});
	$(function(){
		$(document).ready(function(){
			$('.collapse').on('show.bs.collapse',function(){
				$('.collapse.show').collapse('toggle');
				//console.log('ACTIVA#p'+this.id);
				$('#p'+this.id).addClass("toggleActiveS");
			});
			$('.collapse').on('hide.bs.collapse',function(){
				//$('.collapse').collapse('toggle');
				//console.log('DESACT#p'+this.id);
				$('#p'+this.id).removeClass("toggleActiveS");
			});
		});

	});
	$('#iconServ').click(function() {
		menuHamburguesa.removeClass("cerrarAncho");
	    btnCerrarMenuH.hide();
		btnAbrirMenuH.show();
        $('.servicios').addClass('d-none');
        $('.segmentos').removeClass('activo');
        //$('#'+this.id).addClass('activo');
        document.getElementById("menuServicios").style.height="auto";
        document.getElementById("menuServicios").style.display="block";
        document.getElementById("servicios").classList.remove('d-none');
        setTimeout(function(){
            $('.servicios').addClass('d-none');
            $('.segmentos').removeClass('activo');
            document.getElementById("menuServicios").style.height="0px";
            document.getElementById("menuServicios").style.display="none";
        }, 10000);
    });
    $('.segmentos').mouseover(function() {
        $('.servicios').addClass('d-none');
        $('.segmentos').removeClass('activo');
        $('#'+this.id).addClass('activo');
        document.getElementById("menuServiciosComerciales").style.height="auto";
        document.getElementById("menuServiciosComerciales").style.display="block";
        document.getElementById("menuServicios").style.height="0px";
        document.getElementById("menuServicios").style.display="none";
        document.getElementById("ul"+this.id).classList.remove('d-none');
        setTimeout(function(){
            $('.servicios').addClass('d-none');
            $('.segmentos').removeClass('activo');
            document.getElementById("menuServiciosComerciales").style.height="0px";
            document.getElementById("menuServiciosComerciales").style.display="none";
        }, 10000);
    });
    $('.segmentosV').mouseover(function() {
        $('.segmentos').removeClass('activo');
        document.getElementById("menuServiciosComerciales").style.height="0px";
        document.getElementById("menuServiciosComerciales").style.display="none";
    });
    $('.menuServiciosComerciales').click(function() {
        $( '.servicios' ).addClass('d-none');
        $('.segmentos').removeClass('activo');
        document.getElementById("menuServiciosComerciales").style.height="0px";
        document.getElementById("menuServiciosComerciales").style.display="none";
        document.getElementById("menuServicios").style.height="0px";
        document.getElementById("menuServicios").style.display="none";
    });
	//personalizar_header();
	/*personalizar_header();
	function personalizar_header() {
	    let segmento = window.location.href.split("/");
	    segmento = segmento[segmento.length - 1];
	    segmento = segmento.split("#");
	    segmento = segmento[0];
	    //$(".segmento").addClass(segmento);
	    $("#hdr"+segmento).addClass(segmento);
	}*/
});