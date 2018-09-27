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

@if(isset($avance))
<form role="form" method="POST" action="{{ route('Avance.update', $avance->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcionAV">Descripción</label>
        <input type="text" class="form-control" name="descripcionAV"  value="{{ $avance->descripcion }}">

        @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif 
    </div>
    
    <div class="form-group">
        <label for="actividad_Id">Actividad</label>
        <select class="form-control" name="actividad_Id">
            @foreach($actividad as $s)
                {{-- <option value="{{ $s->id }}">{{ $s->descripcion }}</option> --}}
                @if($avance->$actividad == $s->id )
                    <option value="{{ $s->id }}"  selected >{{ $s->descripcion }}</option>
                @else
                    <option value="{{ $s->id}}">{{ $s->descripcion }}</option>
                @endif
            @endforeach
       </select>

       @if($errors->has('actividad_Id'))
        <span style='color:red;'> {{ $errors->first('actividad_Id') }} </span>
        @endif 
    </div>

    
    <div class="form-group">
        <label for="estado_id">Estado</label>
        <select class="form-control" name="estado_id">
            @foreach($estado as $s)
                {{-- <option value="{{ $s->id }}">{{ $s->descripcion }}</option> --}}
                @if($avance->estado_id == $s->id )
                    <option value="{{ $s->id }}"  selected >{{ $s->descripcion }}</option>
                @else
                    <option value="{{ $s->id}}">{{ $s->descripcion }}</option>
                @endif
            @endforeach
       </select>

       @if($errors->has('estado_id'))
        <span style='color:red;'> {{ $errors->first('estado_id') }} </span>
        @endif 
    </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif