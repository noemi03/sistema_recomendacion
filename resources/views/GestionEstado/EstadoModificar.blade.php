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

@if(isset($estado))
<form role="form" method="POST" action="{{ route('Estado.update',  $estado->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" name="descripcion"  value="{{  $estado->descripcion }}">

        @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif 
    </div>
    

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif