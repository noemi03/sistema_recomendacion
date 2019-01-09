
        <div class="modal-body">
        <form  method="POST" role="form" action="" enctype="multipart/form-data" id="formRD">
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_method" id="idCU">
          <div class="form-group">
                <label for="estadoCargo">Estado</label>
                    <select class="form-control" name="estadoCargo" id="cargousuario_estadoCargo">
                          <option>Activo</option>
                          <option>Inactivo</option>
                    </select><br>
              </div>
              <div class="form-group">
                    <label for="fechaInicio">Fecha Inicio:</label>
                    <input type="date" class="form-control form-control-sm" name="fechaInicio" id="cargousuario_fechaInicio" placeholder="Ingrese La Fecha de Inicio"  >
                </div>
              <div class="form-group">
                    <label for="fechaFin">Fecha Finalización:</label>
                    <input type="date" class="form-control" name="fechaFin" id="cargousuario_fechaFin" placeholder=" Ingrese La Fecha de Finalización"  >
                </div>
           

            
              <div class="form-group">
                @include('GestionUsuario.mostrarCargoAlUsuario')
              
                </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarCargosUsuarios()">AGREGAR</button>
    
        </div>
      </form>
      
      
    </div>
  
