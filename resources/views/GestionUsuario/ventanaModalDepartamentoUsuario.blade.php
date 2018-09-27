
        <div class="modal-body">
        <form  method="POST" role="form" action="" enctype="multipart/form-data" id="formRD">
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_method" id="idDU">
          <div class="form-group">
                <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="departamentoUsuario_estado">
                          <option>Activo</option>
                          <option>Inactivo</option>
                    </select><br>
              </div>
              <div class="form-group">
                    <label for="horarioEntrada">Hora entrada:</label>
                    <input type="time" class="form-control form-control-sm" name="horarioEntrada" id="departamentoUsuario_horaEntrada" placeholder="Ingrese el Horario de Entrada"  >
                </div>
              <div class="form-group">
                    <label for="horarioSalida">Hora Salida:</label>
                    <input type="time" class="form-control" name="horarioSalida" id="departamentoUsuario_horaSalida" placeholder=" Ingrese el Horario de Salida"  >
                </div>
           
            
              <div class="form-group">
                @include('GestionUsuario.mostrarDepartamentoAlUsuario')
              
                </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarDepartamentoUsuarios()">AGREGAR</button>
    
        </div>
      </form>
      
      
    </div>
  
