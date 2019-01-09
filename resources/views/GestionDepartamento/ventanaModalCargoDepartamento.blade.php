
        <div class="modal-body">
        <form  method="POST" role="form" action="" enctype="multipart/form-data" id="formRD">
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_method" id="idCD">
                      
              <div class="form-group">
                @include('GestionDepartamento.mostrarCargoAlDepartamento')
              
                </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarCargosDepartamento()">AGREGAR</button>
    
        </div>
      </form>
      
      
    </div>
  
