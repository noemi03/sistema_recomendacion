<div class="modal" tabindex="-1" role="dialog" id="ventanaestado">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i> Asignar estado</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>   
        </div>
        <div class="modal-body">
        <div class="carb-body">
          <div id="tablaEstados"  class="table-responsive">
            <table class="table table-hover table table-bordered  text-center">
            <thead>
                <th>Estado</th>
                <th>Aciones</th>  
            </thead>
            <tbody>
                <tr>
                  <td>
                    EN PROCESO
                  </td>
                  <td class='row'><button type='button' class='btn btn-success' data-toggle='modal'  onClick='CambiarEstado("EN PROCESO")'><i class='fa fa-edit'></i></button></td>
                </tr>
                <tr>
                  <td>
                    Finalizado
                  </td>
                  <td class='row'><button type='button' class='btn btn-success'  onClick='CambiarEstado("FINALIZADO")'><i class='fa fa-edit'></i></button></td>
                </tr>
            </tbody>
            </table>
          </div>
            <div id="txtObservacion" class="form-group">
              <label for="">Observacion</label>
              <textarea class="form-control" id="observacionM" rows="3"></textarea>
            </div>
          </div>
        </div>
        <input id="estadito" type="hidden">
        <input id="idInformeM" type="hidden">
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button id="brnGuardarM" type="button" class="btn btn-warning btn-sm" >CAMBIAR ESTADO</button> 
        </div>
    </div>
  </div>
</div>
