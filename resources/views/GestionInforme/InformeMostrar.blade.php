
 <div class=" row ">
      <div class="col-md-6">
      <div class="form-group has-feedback">
              <input type="text"  class="form-control form-control-sm" placeholder="Buscar Informe" id="B_Infome">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
              <div class="input-group-prepend">
                <span class="input-group-text" id="basuc-addon1">
                  <br>
                </span>
              </div>
              </div>
       </div>
       
       <div class="col-md-4">
              <input id="dtpFechaAprobación" type="date"  class="form-control form-control-sm" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basuc-addon1"> 
                </span>
              </div>
      </div>
      <div class="col-md-1">
        <button id="btnRefrescarInforme" class="form-control form-control-sm btn btn-info" ><i class="fa fa-repeat" aria-hidden="true"></i></button>        
      </div>
    

  </div>




<div class="table-responsive">
    <table class="table table-hover table table-bordered  text-center">

        
           <thead>
               <th>Fecha Aprobación</th>
               <th>Memorando Solicitud</th>     
               <th>Tema Examen</th>  
               <th>%Cumplimiento</th>  
               <th>Observación</th>  
               <th>Codigo Informe</th>
               <th>Archivos</th>
              <th colspan="2">Aciones</th>  
           </thead>
           <tbody id="tablainforme">
          
               
           </tbody>
       
       </table>
    </div>
