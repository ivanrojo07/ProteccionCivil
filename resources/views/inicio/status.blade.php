`<div class="row">
    <div class="col-12 col-md-12 col-lg-8">
        Fichas de seguridad
        <a href="{{route('dashboard')}}">
            <div class="progress" {{-- onclick="detalle()" --}}>
          
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"  style="width:{{$user->ficha_seguridad_progress}}%" aria-valuemin="0" aria-valuemax="100" >{{$user->ficha_seguridad_progress}}% </div> 
            </div> 
        </a>
        <br> 
        Plano Interno y Externo
        <a href="{{ route('planfamiliar') }}">
            <div class="progress" {{-- onclick="detalle()" --}}>  
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar"  style="width:{{$user->plano_interno_externo_progress}}%"  aria-valuemin="0" aria-valuemax="100" >{{$user->plano_interno_externo_progress}}% </div>
            </div>
        </a>
        <br> 
        Botiquín de primeros auxilios
        <a href="{{route('planfamiliar')}}">
            <div class="progress" {{-- onclick="detalle()" --}}>
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"  style="width:{{$user->botiquin_progress}}%" aria-valuemin="0" aria-valuemax="100" >{{$user->botiquin_progress}}% </div> 
            </div>
        </a>
        <br>
        Maleta de vida
        <a href="{{route('planfamiliar')}}">
            <div class="progress" {{-- onclick="detalle()" --}}>
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"  style="width:{{$user->maleta_progress}}%"  aria-valuemin="0" aria-valuemax="100" >{{$user->maleta_progress}}% </div> 
            </div>
        </a>
    </div>
    <div class="col-2 canvas_modal">
        <span class="label_porcent_modal">Total {{$user->progress_bar}}%</span>
        <img id='base64image'                 
           src="${canvas_image}"/>
    </div>
    
</div>
`