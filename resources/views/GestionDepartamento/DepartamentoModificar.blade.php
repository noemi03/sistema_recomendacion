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

@if(isset($departamento))
<form role="form" method="POST" action="{{ route('Departamento.update', $departamento->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcionDepartamento">Descripción</label>
        <input type="text" class="form-control" name="descripcionDepartamento"  value="{{ $departamento->descripcionDepartamento }}">

        @if($errors->has('descripcionDepartamento'))
            <span style='color:red;'> {{ $errors->first('descripcionDepartamento') }} </span>
        @endif 
    </div>
    

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif
