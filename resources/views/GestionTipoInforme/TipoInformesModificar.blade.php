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

@if(isset($tipoinforme)
<form role="form" method="POST" action="{{ route('TipoInforme.update', $tipoinforme->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="tipoInforme">TIPO DE INFORME</label>
        <input type="text" class="form-control" name="tipoInforme"  value="{{ $tipoinforme-> tipoInforme}}">

        @if($errors->has('tipoInforme'))
            <span style='color:red;'> {{ $errors->first('tipoInforme') }} </span>
        @endif 
    </div>
    

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif
