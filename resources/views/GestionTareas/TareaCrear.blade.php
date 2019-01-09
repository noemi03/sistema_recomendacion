@if(session()->has('msj'))
<div class="alert alert-success" role="alert">
  {{ session('msj') }}
</div>
@endif

@if(session()->has('errormsj'))
<div class="alert alert-danger" role="alert">
  ¡Error al guardar los datos!
</div>
@endif 

<form role="form" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->
    
    
    <div class="col-md-4 ">
     <div class="panel ">
     <div class="form-group">
     <label for="descripcionTarea">Descripcion</label>
     <input type="text" class="form-control" name="descripcionTarea" id="tarea_descripcionTarea" placeholder="Ingrese la descripcion">
         
    </div>
    </div>
    </div>

     <div class="col-md-4 ">
     <div class="panel ">
    <div class="form-group">
        <label for="porcentajeCumplimientotarea">Porcentaje Cumplimiento</label>
       <input type="text" class="form-control" name="porcentajeCumplimientotarea" id="tarea_porcentajeCumplimientotarea" placeholder="Ingrese el porcentaje">
     
    </div>
    </div>
    </div>


     <div class="col-md-4 ">
     <div class="panel ">
     <div class="form-group">
        <label for="estadoTarea">Estado</label>
        <input type="text" class="form-control" name="estadoTarea" id="tarea_estadoTarea" placeholder="Ingrese el estado">

    </div>
    </div>  
    </div>
    
    <div class="col-md-4">
     <div class="panel ">
    <div class="form-group">
        <label for="fechaCreacion">Fecha Creacion</label>
        <input type="date" class="form-control" name="fechaCreacion" id="tarea_fechaCreacion" placeholder="Ingrese la fecha">

    </div>  
    </div>   
    </div>

    <div class="col-md-4">
     <div class="panel ">
     <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha" id="tarea_fecha" placeholder="Ingrese la descripcion">

    </div>   
    </div>  
    </div>

    <div class="col-md-4 ">
     <div class="panel ">
      <div class="form-group">
        <label for="recomendacionesusuarios_id">Recomendacion Usuarios</label>
        <select class="form-control" name="recomendacionesusuarios_id" id="tarea_recomendacionesusuarios_id">
        
            @foreach($recomendacionesUsuarios as $s)
               
                <option value="{{ $s->id }}">{{ $s->codigoDocumento}}</option>
          
            @endforeach
           
       </select>
      
    </div>
    </div>  
    </div>
    
<div class="col-md-10 ">
<div class="panel " >
 <button type="button" class="btn btn-primary btn-lg"  onclick="ingresarTareas()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
</div>
</div>


<div class="col-md-2 ">
<div class="panel " >
   <td><a href="Actividad" class="create-modal btn btn-primary btn-block btn-flat ">Salir</a></td>
</div>
</div>

</form>