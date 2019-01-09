<div class="modal" tabindex="-1" role="dialog" id="mostralmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i> ASIGNAR CARGO</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#asignar">Asignar</a></li>
        <li><a data-toggle="tab" href="#mostrar">Mostrar</a></li>
      </ul>
        
         <div class="tab-content">
        <div id="asignar" class="tab-pane fade in active" class="form-group">
        @include('GestionUsuario.ventanaModalCargoUsuario') 
        </div>
        <br>
        <br>
        <div id="mostrar" class="tab-pane fade">
         @include('GestionUsuario.mostrarUsuarioCargo')   
        </div>
      </div>

           
        
    </div>
  </div>
</div>