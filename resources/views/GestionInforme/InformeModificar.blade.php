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

@if(isset($informes))
<form role="form" method="POST" action="{{ route('Informe.update', $informes->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="fechaAprobacion">fechaAprobacion</label>
        <input type="date" class="form-control" name="fechaAprobacion"  value="{{$informes->fechaAprobacion }}">

        @if($errors->has('fechaAprobacion'))
            <span style='color:red;'> {{ $errors->first('fechaAprobacion') }} </span>
        @endif 
    </div>
     <div class="form-group">
        <label for="memorandoSolicitud">memorandoSolicitud</label>
        <input type="text" class="form-control" name="memorandoSolicitud"   value="{{$informes->memorandoSolicitud }}">

        @if($errors->has('memorandoSolicitud'))
            <span style='color:red;'> {{ $errors->first('memorandoSolicitud') }} </span>
        @endif 
    </div>
    
    <div class="form-group">
        <label for="temaExamen">temaExamen</label>
        <input type="text" class="form-control" name="temaExamen" value="{{$informes->temaExamen}}">

    </div>
    <div class="form-group">
        <label for="porcentajeCumplido">%cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplido"  value="{{$informes->porcentajeCumplido}}">

    </div>
    <div class="form-group">
        <label for="observacion">observacion</label>
        <input type="text" class="form-control" name="observacion"  value="{{$informes->observacion}}">

    </div>

     <div class="form-group">
        <label for="codigoInforme">codigoInforme</label>
        <input type="text" class="form-control" name="codigoInforme"   value="{{$informes->codigoInforme}}">

    </div>


  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endif