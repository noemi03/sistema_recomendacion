
<div class=" row ">
    <div class="col-md-6">
      <div class="form-group has-feedback">
                <input type="text"  class="form-control form-control-sm" placeholder="Buscar Recomendacion" id="B_Recomendacion">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basuc-addon1">
                    <br>
                    </span>
                </div>
       </div>
    </div>

     
</div>

<div class="table-responsive">
    <table class="table table-hover table table-bordered  text-center table-responsive">
        
        @if(isset($recomendacion))
           <thead>
               <th>Descripción</th>
               <th>%Cumplimiento</th>   
               <th>Subtema</th>  
              <th>Estado</th>  
              <th>Tipo Recomendacion</th>    
              <th colspan="3">Acciones</th>
           </thead>
           <tbody id="#tablaRecomendacion">
               @foreach($recomendacion as $r)
                   <tr>
                       <td>{{ $r->descripcion }}</td>
                        <td>{{ $r->porcentajeCumplimiento}}</td>
                       <td>{{ $r->subtemas->descripcion }}</td> 
                       <td>{{ $r->Estado->descripcion }}</td> 
                       <td>{{ $r->TipoRecomendacion->descripcion }}</td>               
                    <td><button  onclick="editarrecomendaciones({{$r->id}})" class="btn btn-success" ><i class="fa fa-refresh"></i></button></td>         
                    <td><form action="{{ route('recomendaciones.destroy', $r->id) }}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }} <!-- Para validar el token -->
                        <button  onclick="eliminarRecomendacion()" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                        
                    </form>
                    </td>
                    <td><button  class="btn btn-warning"  onclick="mostrar_recomendacion_departamento({{$r->id}})" ><i class="fa fa-plus-square" aria-hidden="true"></i></button></td>         
                   </tr>
               @endforeach
           </tbody>
        @endif
       </table>
    </div>
       