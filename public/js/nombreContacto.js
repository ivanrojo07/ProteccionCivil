jQuery(document).ready(function ($) {
    const contenedorFoto = document.querySelector('.fotodef');
    var separador = " ";
    var arregloDeSubCadenas = nombreUsuario.split(separador,2);
    for (x=0;x<arregloDeSubCadenas.length;x++){
        var subCadena = arregloDeSubCadenas[x].substring(0, 1);
        var iniciales = subCadena + " ";
        contenedorFoto.innerHTML += `<p> ${iniciales} </p>`;
    }
});            