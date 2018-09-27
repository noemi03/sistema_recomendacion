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

@if(isset($recodepar))
<form role="form" method="POST" action="{{ route('RecomendacionesDepartamento.update', $recodepar->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado"  value="{{ $recomendacion->estado }}">

        @if($errors->has('estado'))
            <span style='color:red;'> {{ $errors->first('estado') }} </span>
        @endif 
    </div> 
    <div class="form-group">
        <label for="departamento_id">Departamento</label>
        <select class="form-control" name="departamento_id">
            @foreach($departamento as $s)
                {{-- <option value="{{ $s->id }}">{{ $s->descripcion}}</option> --}}
                @if($recodepar->departamento_id == $s->id )
                    <option value="{{ $s->id }}"  selected >{{ $s->descripcion }}</option>
                @else
                    <option value="{{ $s->id}}">{{ $s->descripcion }}</option>
                @endif
            @endforeach
       </select>

       @if($errors->has('departamento_id'))
        <span style='color:red;'> {{ $errors->first('departamento_id') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="recomendacion_id">Recomendacion</label>
        <select class="form-control" name="recomendacion_id">
            @foreach($recomendacion as $s)
                {{-- <option value="{{ $s->id }}">{{ $s->descripcion}}</option> --}}
                @if($recodepar->recomendacion_id== $s->id )
                    <option value="{{ $s->descripcion }}"  selected >{{ $s->descripcion }}</option>
                @else
                    <option value="{{ $s->id}}">{{ $s->descripcion }}</option>
                @endif
            @endforeach
       </select>

       @if($errors->has('recomendacion_id'))
        <span style='color:red;'> {{ $errors->first('recomendacion_id') }} </span>
        @endif 
    </div>
    
   

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif