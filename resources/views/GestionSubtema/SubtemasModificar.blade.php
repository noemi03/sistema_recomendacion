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

@if(isset($subtemas))
<form role="form" method="POST" action="{{ route('subtema.update', $subtemas->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" name="descripcion"  value="{{ $subtemas->descripcion }}">

        @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif 
    </div>
    
    <div class="form-group">
        <label for="conclusion">Conclusión</label>
        <input type="text" class="form-control" name="conclusion"  value="{{ $subtemas->conclusion }}">

        @if($errors->has('conclusion'))
            <span style='color:red;'> {{ $errors->first('conclusion') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="porcentajeCumplido">Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplido"  value="{{ $subtemas->porcentajeCumplido }}">

        @if($errors->has('porcentajeCumplido'))
            <span style='color:red;'> {{ $errors->first('porcentajeCumplido') }} </span>
        @endif 
    </div>
      <div class="form-group">
        <label for="informe_id">Informe</label>
        <select class="form-control" name="informe_id">
            @foreach($informe as $s)
                {{-- <option value="{{ $s->id }}">{{ $s->observacion }}</option> --}}
                @if($subtemas->informe_id== $s->id )
                    <option value="{{ $s->id}}"  selected >{{ $s->observacion }}</option>
                @else
                    <option value="{{ $s->id}}">{{ $s->observacion}}</option>
                @endif
            @endforeach
       </select>

       @if($errors->has('informe_id'))
        <span style='color:red;'> {{ $errors->first('informe_id') }} </span>
        @endif 
    </div>

    

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif
