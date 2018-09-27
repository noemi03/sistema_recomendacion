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
        <input type="text" class="form-control" name="descripcion" id="subtema_descripcion"    placeholder="Ingrese la descripcion">

        @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif 
    </div>
    
    <div class="form-group">
        <label for="conclusion">Conclusion</label>
        <input type="text" class="form-control" name="conclusion" id="subtema_conclusion" placeholder="Ingrese la conclusion">

        @if($errors->has('conclusion'))
            <span style='color:red;'> {{ $errors->first('conclusion') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="porcentajeCumplido">%Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplido"  id="subtema_cumplimiento" placeholder="Ingrese la %Cumplimiento">

        @if($errors->has('porcentajeCumplido'))
            <span style='color:red;'> {{ $errors->first('porcentajeCumplido') }} </span>
        @endif 
    </div>
      <div class="form-group">
        <label for="informe_id">Informe</label>
        <select class="form-control" name="informe_id" id="subtema_informe">
        
            @foreach($informe as $s)
               
                <option value="{{ $s->id }}">{{ $s->temaExamen}}</option>
          
            @endforeach
           
       </select>

       
    </div>

  <button type="button" class="btn btn-primary btn-lg" onclick="ingresarSubtema()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
</form>