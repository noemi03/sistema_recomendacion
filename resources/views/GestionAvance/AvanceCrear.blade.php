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
        <label for="descripcionAV">Descripcion</label>
        <input type="text" class="form-control" name="descripcionAV" id="descripcionAvance"  placeholder="Ingrese la descripcion" required>

       
    </div>
    <div class="form-group">
        <label for="actividad_Id">Actividad</label>
        <select class="form-control" name="actividad_Id" id="ActividadId">
            @foreach($actividad as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcionA }}</option>
          
            @endforeach
       </select>

     
       
       
    </div>
    <div class="form-group">
        <label for="estado_id">Estado</label>
        <select class="form-control" name="estado_id" id="Estadoid">
            @foreach($estado as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcion }}</option>
          
            @endforeach
       </select>

      
    
       
    </div>
     <div class="form-group">

          <button type="button" class="btn btn-primary btn-lg" onclick="AvanceInsert()" ><i class="fa fa-floppy-o " aria-hidden="true"></i></button>

    </div>
</form>