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

@if(isset($actividad))
<form role="form" method="POST" action="{{ route('Actividad.update', $actividad->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcionActividad">Descripción</label>
        <input type="text" class="form-control" name="descripcionActividad"  value="{{$actividad->descripcionA}}">

        @if($errors->has('descripcionActividad'))
            <span style='color:red;'> {{ $errors->first('descripcionActividad') }} </span>
        @endif 
    </div>
    
    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha"  value="{{$actividad->fecha}}">

        @if($errors->has('fecha'))
            <span style='color:red;'> {{ $errors->first('fecha') }} </span>
        @endif 
    </div>


<div class="form-group row">
    <label for="tarea_id" class="col-sm-2 col-form-label">TAREA</label>
    <div class="col-sm-10">
      <select class="form-control" name="tarea_id" >
        
        @foreach($tarea as $t)
         @if($actividad->tarea_id == $t->descripcionTarea)
        <option value="{{$t->id}}" selected>{{$t->descripcionTarea}}</option>
          @else
          <option value="{{$t->id}}">{{$t->descripcionTarea}}</option>
          @endif
        @endforeach

      </select>
    </div>
    </div>



  <button type="submit" class="btn btn-primary">Modificar</button>
</form>
@endif