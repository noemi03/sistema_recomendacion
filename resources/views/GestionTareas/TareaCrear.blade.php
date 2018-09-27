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
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="tarea_descripcion" placeholder="Ingrese la descripcion">

        @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif 
    </div>
    
      <div class="form-group">
        <label for="recomendacionesDepartamentoid">Recomendacion</label>
        <select class="form-control" name="recomendacionesDepartamentoid" id="tarea_recomendacionD">
        
            @foreach($reco as $s)
               
                <option value="{{ $s->id }}">{{ $s->estado}}</option>
          
            @endforeach
           
       </select>

       @if($errors->has('$recomendacionesDepartamentoid'))
        <span style='color:red;'> {{ $errors->first('$recomendacionesDepartamentoid') }} </span>
        @endif 
    </div>

  <button type="button" class="btn btn-primary btn-lg"  onclick="ingresarTareas()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
</form>