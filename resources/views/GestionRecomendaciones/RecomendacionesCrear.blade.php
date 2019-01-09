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
        <label for="descripcionRecomendacion">Descripcion</label>
        <input type="text" class="form-control" name="descripcionRecomendacion" id="R_descripcion" placeholder="Ingrese la descripcion">
         
    </div>
    <div class="form-group">
        <label for="porcentajeCumplimiento">Porcentaje De Cumplimiento</label>
       <input type="text" class="form-control" name="porcentajeCumplimiento" id="R_cumplimiento" placeholder="Ingrese el porcentaje">
     
    </div>

    <div class="form-group">
        <label for="estadoRecomendacion">Estado</label>
        <input type="text" class="form-control" name="estadoRecomendacion" id="R_estado" placeholder="Ingrese el estado">
        </div>
        
    <div class="form-group">
        <label for="subtema_id">Subtema</label>
        <select class="form-control" name="subtema_id" id="R_subtema">
        
            @foreach($subtemas as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcionSubtema}}</option>
          
            @endforeach           
       </select>
   </div>
<button type="button" class="btn btn-primary btn-lg" onclick="ingresarRecomendaciones()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
</form>