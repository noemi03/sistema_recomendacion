 <div class=" row ">
      <div class="col-md-6">
      <div class="form-group has-feedback">
              <input type="text"  class="form-control form-control-sm" placeholder="Buscar Actividad" onkeyup="consultarActividad()" id="buscar_Actividad">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
              <div class="input-group-prepend">
                <span class="input-group-text" id="basuc-addon1">
                  <br>
                </span>
              </div>
              </div>
       </div>
       
       <div class="col-md-4">
              <input id="dtpFecha" type="date"  class="form-control form-control-sm" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basuc-addon1"> 
                </span>
              </div>
      </div>
      <div class="col-md-1">
        <button id="btnRefrescar" class="form-control form-control-sm btn btn-info" ><i class="fa fa-repeat" aria-hidden="true"></i></button>        
      </div>
    

  </div>


<div class="table-responsive">
    <table class="table table-hover table table-bordered  text-center">
 <thead>
   <tr >
     <th >Actividad</th>
     <th >Fecha</th>
     <th >Tarea</th>
     <th colspan="2">Aciones</th>     
     </tr>

 </thead>
 <tbody id="tablaactividad">
   
 </tbody>
</table>
</div>

  

