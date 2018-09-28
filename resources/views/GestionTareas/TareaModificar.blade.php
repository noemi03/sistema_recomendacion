
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Form Persona</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

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


@if(isset($tarea))
<form role="form" method="POST" action="{{route('Tarea.update',$tarea->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" name="descripcion"  value="{{$tarea->descripcion}}">

        @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="porcentajeCumplimiento">Porcentaje Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplimiento"  value="{{$tarea->porcentajeCumplimiento}}">

        @if($errors->has('porcentajeCumplimiento'))
            <span style='color:red;'> {{ $errors->first('porcentajeCumplimiento') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="porcentajeEquivalente">Porcentaje Equivalente</label>
        <input type="text" class="form-control" name="porcentajeEquivalente"  value="{{$tarea->porcentajeEquivalente}}">

        @if($errors->has('porcentajeEquivalente'))
            <span style='color:red;'> {{ $errors->first('porcentajeEquivalente') }} </span>
        @endif 
    </div>
    
    
<div class="form-group row">
    <label for="recomendacionesDepartamentoid" class="col-sm-2 col-form-label">Recomendaciones Departamento</label>
    <div class="col-sm-10">
      <select class="form-control" name="recomendacionesDepartamentoid" >
        
        @foreach($reco as $t)

         @if($tarea->recomendacionesDepartamentoid == $t->estado)
         
        <option value="{{$t->id}}" selected>{{$t->estado}}</option>
          @else
          <option value="{{$t->id}}">{{$t->estado}}</option>
          @endif
        @endforeach

      </select>
    </div>
    </div>

  <button type="submit" class="btn btn-primary">Modificar</button>
</form>
@endif