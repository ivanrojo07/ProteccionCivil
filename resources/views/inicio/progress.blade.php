<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10">
            <h1>Mi Plan Familiar</h1>
            <div class="row">
                <div class="col-3 ficha">
                    <span>Fichas de seguridad</span>
                </div>
                <div class="col-3 planIE">
                    <span>Plano Interno y Externo</span>
                </div>
                <div class="col-3 botiquin">
                    <span>Botiquín de Primeros Auxilios</span>
                </div>
                <div class="col-3 maleta">
                    <span>Maleta de Vida</span>
                </div>
            </div>
                <div class="progress" onclick="detalle()" style="cursor: pointer;">
                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"  style="width:{{$user->progress_bar}}%"  aria-valuemin="0" aria-valuemax="100" >{{$user->progress_bar}}%
                  </div>
                </div>
        </div>
        <div class="col-2 offset-3 col-sm-2 offset-sm-0 col-md-2 offset-md-0 mt-5 mb-5" style="z-index:1;">
            {{-- GRAFICA PIE DINAMICO --}}
            {{-- <div class="chart" id="graph" data-percent="{{$user->progress_bar}}"></div> --}}
            <div class="chart" id="graph" data-percent="{{$user->progress_bar}}" onclick="detalle()" style="cursor: pointer;"></div>
        </div>
    </div>

</div>