

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
    <div class="form-group">
        <label for="descripcionA">Descripcion</label>
        <input type="text" class="form-control" name="descripcionA" id="actividad_descripcion"  placeholder="Ingrese la descripcion">

        @if($errors->has('descripcionA'))
            <span style='color:red;'> {{ $errors->first('descripcionA') }} </span>
        @endif 
    </div>

      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="actividad_fecha"   name="fecha">

        @if($errors->has('fecha'))
            <span style='color:red;'> {{ $errors->first('fecha') }} </span>
        @endif 
    </div>
    
    
    <div class="form-group">
    <label for="tarea_id" class="col-sm-2 col-form-label">Tarea</label>
    <select class="form-control" name="tarea_id"  id="actividad_tarea">    

               @foreach($tarea as $m)               
                <option value="{{ $m->id }}">{{ $m->descripcion}}</option>          
            @endforeach
       </select>    
       @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif
    </div>
        
   

  <button type="button" class="btn btn-primary btn-lg"   onclick="ingresarActividad()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
  
  <br>
</form>
<br>