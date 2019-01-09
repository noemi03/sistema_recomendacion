

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

     <div class="col-md-6 ">
     <div class="panel ">
     <div class="form-group">
        <label for="desc
        ripcionActividad">Descripcion</label>
        <input type="text" class="form-control" name="descripcionActividad" id="actividad_descripcion"  placeholder="Ingrese la descripcion">
    </div>
    </div>
    </div>

    <div class="col-md-6 ">
     <div class="panel ">
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="actividad_fecha"   name="fecha">

        @if($errors->has('fecha'))
            <span style='color:red;'> {{ $errors->first('fecha') }} </span>
        @endif 
    </div>
    </div>
    </div>
    
   
    <div class="col-md-6">
     <div class="panel ">
     <br>
     <td><a href="Tarea" class="create-modal btn btn-primary btn-block btn-flat ">Crear Tareas</a></td>

</div>
</div>
 

     <div class="col-md-6 ">
     <div class="panel ">
     <div class="form-group">
    <label for="tarea_id" class="col-sm-2 col-form-label">Tarea</label>
    <select class="form-control" name="tarea_id"  id="actividad_tarea">    

               @foreach($tareas as $m)               
                <option value="{{ $m->id }}">{{ $m->descripcionTarea}}</option>          
            @endforeach
       </select>    
       @if($errors->has('descripcionTarea'))
            <span style='color:red;'> {{ $errors->first('descripcionTarea') }} </span>
        @endif

 </div>
</div>
</div>


<div class="panel " >
  <button type="button" class="btn btn-primary btn-lg"  onclick="ingresarActividad()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
</div>

</form>
<br>