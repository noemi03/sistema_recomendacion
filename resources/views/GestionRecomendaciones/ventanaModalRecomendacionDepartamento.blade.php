



<div disabled class="modal fade" id="ventanaModalRecomendacionDepartamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content" id="bodymodalRD">
      <form  method="POST" role="form" action="" enctype="multipart/form-data" id="formRD">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">ASIGNAR DEPARTAMENTOS</h5>
        
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>  </button>
        </div>
        <div class="modal-body">



          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_method" id="idr">

            <div class="form-group row">
             <label for="estado" class="col-sm-1 col-form-label">Estado</label>
             <div class="col-sm-11">
             <select class="form-control" name="estado" id="estado">
                <option>Realizado</option>
                <option>Pendiente</option>
              </select><br>
               </div>
              </div>

                <div class="form-group">
                @include('GestionRecomendaciones.mostrarDepartamento')
              
                </div>
           <br>
           <br>
           @include('GestionRecomendaciones.mostrarRecomendacionDepartamento')
           
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarRecomendacionDepartamento()">AGREGAR</button>
    
        </div>
      </form>
      
    </div>
  </div>
</div>

