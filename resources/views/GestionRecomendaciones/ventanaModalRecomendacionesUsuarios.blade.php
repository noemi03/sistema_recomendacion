
        <div class="modal-body">
        <form  method="POST" role="form" action="" enctype="multipart/form-data" id="formRD">
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_method" id="idRU">


              <div class="col-md-4 ">
              <div class="panel " >
              <div class="form-group">
                    <label for="estadoRecomendacionUsuario">Estado:</label>
                    <input type="text" class="form-control form-control-sm" name="estadoRecomendacionUsuario" id="RecoUser_Estado">
                </div>
                </div>
               </div>

              <div class="col-md-4 ">
              <div class="panel " >
              <div class="form-group">
                    <label for="porcentajeCumplimiento">%Cumplimiento:</label>
                    <input type="text" class="form-control" name="porcentajeCumplimiento" id="RecoUser_PCumplimiento">
                </div>
                </div>
               </div>

              <div class="col-md-4 ">
              <div class="panel " >
                <div class="form-group">
                    <label for="fechaInicio">Fecha Inicial:</label>
                    <input type="date" class="form-control form-control-sm" name="fechaInicio" id="RecoUser_FInicial">
                </div>
                </div>
               </div>

              <div class="col-md-4 ">
              <div class="panel " >
              <div class="form-group">
                    <label for="fechaFin">Fecha Fin::</label>
                    <input type="date" class="form-control" name="fechaFin" id="RecoUser_FFinal">
                </div>
                </div>
               </div>

              <div class="col-md-4 ">
              <div class="panel " >
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="text" class="form-control form-control-sm" name="documento" id="RecoUser_Documento">
                </div>
                </div>
               </div>

              
              <div class="col-md-4 ">
              <div class="panel " >
              <div class="form-group">
                    <label for="codigoDocumento">Codigo Docuemento:</label>
                    <input type="text" class="form-control" name="codigoDocumento" id="RecoUser_codigo">
                </div>
                </div>
               </div>

              <div class="col-md-12 ">
              <div class="panel " >
              <div class="form-group">
                @include('GestionRecomendaciones.MostrarRecomendacionesAlUsuario')
              
                </div>
                </div>
               </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarRecomendacionesUsuarios()">AGREGAR</button>
    
        </div>
      </form>
      
      
    </div>
  
