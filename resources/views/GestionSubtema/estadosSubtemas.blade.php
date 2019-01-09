<div class="modal" tabindex="-1" role="dialog" id="ventanaestadoSubtema">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i> Asignar Estado</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>   
        </div>
        <div class="modal-body">
        <div class="carb-body">
          <div id="tablaEstadosSubtema"  class="table-responsive">
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
                  <td class='row'><button type='button' class='btn btn-success' data-toggle='modal'  onClick='CambiarEstadoSubtema("EN PROCESO")'><i class='fa fa-edit'></i></button></td>
                </tr>
                <tr>
                  <td>
                    Finalizado
                  </td>
                  <td class='row'><button type='button' class='btn btn-success'  onClick='CambiarEstadoSubtema("FINALIZADO")'><i class='fa fa-edit'></i></button></td>
                </tr>
            </tbody>
            </table>
          </div>
            <div id="txtconclusion" class="form-group">
              <label for="">Conclusion</label>
              <textarea class="form-control" id="conclusionM" rows="3"></textarea>
            </div>
          </div>
        </div>
        <input id="estadosubtema" type="hidden">
        <input id="idSubtemam1" type="hidden">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button id="brnGuardarEstadoM" type="button" class="btn btn-warning btn-sm" >CAMBIAR ESTADO</button> 
        </div>
    </div>
  </div>
</div>