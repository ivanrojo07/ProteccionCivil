function funcion_aparecer(){
    //Con esto hacemos referencia al modal y lo guardamos
    var menu = document.getElementById('menue');
    var menue = document.getElementById('menux');
    var miModal = document.getElementById('miModal');
    //Acá hacemos aparecer al modal
    $("#miModal").fadeIn("3000");
   $("#menue").css("display","none"); 
   $("#menux").css("display","block"); 
  // menue.style.display='block';
    //menu.style.display='none';
     

    miModal.style.display = 'block';
}

function funcion_cerrar(){
  $("#miModal").fadeIn("slow");
    //Con esto hacemos referencia al modal y lo guardamos
    var menu = document.getElementById('menue');
    var menue = document.getElementById('menux');
    var miModal = document.getElementById('miModal');
    //Acá hacemos invisible al modal

    miModal.style.display = 'none';
     menue.style.display='none';
     menu.style.display='block';
}

function funcion_aparecer1(){
    //Con esto hacemos referencia al modal y lo guardamos
   
    var miModal = document.getElementById('miModal');
    //Acá hacemos aparecer al modal
    $("#miModal").fadeIn("3000");
   $("#menue1").css("display","none"); 
   $("#menux1").css("display","block"); 
  // menue.style.display='block';
    //menu.style.display='none';
     

    miModal.style.display = 'block';
}

function funcion_cerrar1(){
  $("#miModal").fadeIn("slow");
    //Con esto hacemos referencia al modal y lo guardamos
    var menu = document.getElementById('menue1');
    var menue = document.getElementById('menux1');
    var miModal = document.getElementById('miModal');
    //Acá hacemos invisible al modal

    miModal.style.display = 'none';
     menue.style.display='none';
     menu.style.display='block';
}