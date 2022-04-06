var location_user = null;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.warn("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    //console.log(position);
    location_user = position.coords;
    var coords = {lat: location_user.latitude, lng: location_user.longitude};
    var geo_coder = new google.maps.Geocoder;
    geo_coder.geocode({'location': coords}, function (results, status) {
        if (status === 'OK'){
            //console.log(results);
            location_user.estado = "";
            location_user.estado_long = "";
            location_user.colonia = "";
            location_user.municipio = "";
            location_user.delegacion = "";
            for (var i = 0; i < results.length; i++){
                for (var j = 0; j < results[i].address_components.length; j++) {
                    if (location_user.estado !== "")
                        break;
                    for (var z = 0; z < results[i].address_components[j].types.length; z++) {
                        if (results[i].address_components[j].types[z] === "administrative_area_level_1") {
                            location_user.estado = results[i].address_components[j].short_name.toUpperCase().slice(0, 3);
                            location_user.estado_long = results[i].address_components[j].long_name;
                            //console.log("Estado: "+location_user.estado);
                        }
                        if (results[i].address_components[j].types[z] === "sublocality_level_1") {
                            location_user.colonia = results[i].address_components[j].short_name;
                            //console.log("Colonia: "+location_user.colonia);
                        }
                        if (results[i].address_components[j].types[z] === "locality") {
                            location_user.municipio = results[i].address_components[j].short_name;
                            //console.log("Municipio: "+location_user.municipio);
                        }
                        if (results[i].address_components[j].types[z] === "administrative_area_level_3") {
                            location_user.delegacion = results[i].address_components[j].long_name;
                            //console.log("Municipio: "+location_user.municipio);
                        }
                        if (location_user.estado !== "" && location_user.delegacion !== "" && location_user.colonia !== "" && location_user.municipio !== "") {
                            break;
                        }
                    }
                }
            }
            //console.log(location_user.colonia+' '+location_user.municipio+' '+location_user.estado);
            //console.log(location_user);
            document.getElementById("ubicacion").innerHTML = location_user.colonia+' '+location_user.municipio+' '+location_user.estado;
            FunSemaforo(location_user.estado);
            FunClima(location_user.estado_long);
        }
    });
}
function FunSemaforo(estado){
    spnSemaforo = document.getElementById("semaforo");
    spnColorSemaforo = document.getElementById("colorsemaforo");
    //console.log(estado);
    isoEdo = eliminarDiacriticosEs(estado);
    //console.log(isoEdo);
    fetch("https://gis-360.ml/GisMexico",{
        headers : { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        method:'GET',
    })
    .then(response => response.json())
    .then(function(data){ 
        //console.log(data);
        for (var i = 0; i < data.length; i++) {
            isoEstado = data[i].ISO;
            if (isoEdo == isoEstado) {
                //console.log(data[i]);
                //console.log(data[i].ISO);
                switch (data[i].Semaforo){
                    case 1:
                        //console.log("Semaforo Verde");
                        spnSemaforo.innerHTML = "Semaforo: Verde";
                        spnSemaforo.style.color = '#26ff00';
                        spnColorSemaforo.style.background = '#26ff00';
                        break;
                    case 2:
                        //console.log("Semaforo Amarillo");
                        spnSemaforo.innerHTML = "Semaforo: Amarillo";
                        spnSemaforo.style.color = '#ffed4a';
                        spnColorSemaforo.style.background = '#ffed4a';
                        break;
                    case 3:
                        //console.log("Semaforo Naranja");
                        spnSemaforo.innerHTML = "Semaforo: Naranja";
                        spnSemaforo.style.color = '#f58220';
                        spnColorSemaforo.style.background = '#f58220';
                        break;
                    case 4:
                        //console.log("Semaforo Rojo");
                        spnSemaforo.innerHTML = "Semaforo: Rojo";
                        spnSemaforo.style.color = '#da291c';
                        spnColorSemaforo.style.background = '#da291c';
                        break;
                    default:
                        spnSemaforo.innerHTML = "Semaforo: Sin Información";
                        break;
                }
            }
        }        
    });
}
const FunClima = (variable_municipio) => {
    try {
        fetch("https://api.openweathermap.org/data/2.5/weather?q=" + variable_municipio + "&appid=fbc6b3bdbb075a992d5f2d897ac46294&units=metric")
        .then(response => response.json())
        .then(data => obj = data)
        .then(() => {
            if (obj.main) {
                //console.log(obj)
                ClimaAPI = obj.main.temp;
                //console.log(ClimaAPI)
                Imagen = obj.weather[0].icon;
                //Clima = $(".clima");
                ImagenUrl = "https://openweathermap.org/img/w/" + Imagen + ".png";
                //console.log(ImagenUrl)
                //let img = $("<img src=\"" + ImagenUrl + "\"></img>");
                //let t = $("<span>" + ClimaAPI + "°</span>");
                //t.css({
                //    "font": "bold 2rem Arial",
                //    "color": "#666"
                //});
                //Clima.append(img);
               // Clima.append(t);
                //ImgClima = document.getElementById("clima_icon").src = ImagenUrl;
                //Clima.innerHTML = ClimaAPI+"°";
            }
        });
    } catch (e) {
        //console.warn(e);
    }
}
function eliminarDiacriticosEs(texto) {
    return texto
           .normalize('NFD')
           .replace(/([^n\u0300-\u036f]|n(?!\u0303(?![\u0300-\u036f])))[\u0300-\u036f]+/gi,"$1")
           .normalize();
}
getLocation();
