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

<form role="form" method="POST" action="{{ url('recomendaciones') }}" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
       
        <textarea type="text" class="form-control" name="descripcion"  placeholder="Ingrese la descripcion"></textarea>
       
    </div>
    <div class="form-group">
        <label for="porcentajeCumplimiento">%Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplimiento"  placeholder="Ingrese la %Cumplimiento">

        
    </div>
    
    <div class="form-group">
        <label for="subtema_id">Subtema</label>
        <select class="form-control" name="subtema_id">
            @foreach($subtema as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcion }}</option>
          
            @endforeach
       </select>

       
    </div>
    
     <div class="form-group">
        <label for="estado_id">Estado</label>
        <select class="form-control" name="estado_id">
            @foreach($estado as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcion }}</option>
          
            @endforeach
       </select>

    </div>
   
    <div class="form-group">
        <label for="tiporecomendaciones_id">Tipo Recomendacion</label>
        <select class="form-control" name="tiporecomendaciones_id">
            @foreach($tipoR as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcion }}</option>
          
            @endforeach
       </select>

       
    </div>

    

  <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" ></i></button>
</form>