<!-- /.modal de Mensajes -->
 <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="right: 0%;top: -95%;left: 0%;">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Mensaje:</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             |<span aria-hidden="true">&times;</span>
         </button>
       </div><!-- /.modal-header -->

       <div class="modal-body">
         <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <span aria-hidden="true"></span>
           </div>
           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <h4 id="mensaje">
                {{$success}}
              </h4>
           </div>
         </div>
       </div><!-- /.modal-body -->

       <div class="modal-footer">
           <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->