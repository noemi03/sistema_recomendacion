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

@if(isset($cargos))
<form role="form" method="POST" action="{{ route('Cargo.update', $cargos->id) }}" enctype="multipart/form-data">  
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcionCargo">Cargo</label>
        <input type="text" class="form-control" name="descripcionCargo"  value="{{ $cargos->descripcionCargo }}">

        @if($errors->has('descripcionCargo'))
            <span style='color:red;'> {{ $errors->first('descripcionCargo') }} </span>
        @endif 
    </div>
    

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif
