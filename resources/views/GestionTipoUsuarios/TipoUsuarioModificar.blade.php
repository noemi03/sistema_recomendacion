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

@if(isset( $tipo))
<form role="form" method="POST" action="{{ route('TipoUsuario.update',  $tipo->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripciontipo">Descripción</label>
        <input type="text" class="form-control" name="descripciontipo"  value="{{ $tipo->descripciontipo }}">

        @if($errors->has('descripciontipo'))
            <span style='color:red;'> {{ $errors->first('descripciontipo') }} </span>
        @endif 
    </div>
    

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif