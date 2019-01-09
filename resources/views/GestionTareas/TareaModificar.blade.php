
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


@if(isset($tareas))
<form role="form" method="POST" action="{{route('Tarea.update',$tareas->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcionTarea">Descripción</label>
        <input type="text" class="form-control" name="descripcionTarea"  value="{{$tareas->descripcionTarea}}">

        @if($errors->has('descripcionTarea'))
            <span style='color:red;'> {{ $errors->first('descripcionTarea') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="porcentajeCumplimientotarea">Porcentaje Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplimientotarea"  value="{{$tareas->porcentajeCumplimientotarea}}">

        @if($errors->has('porcentajeCumplimiento'))
            <span style='color:red;'> {{ $errors->first('porcentajeCumplimiento') }} </span>
        @endif 
    </div>
    <div class="form-group">
        <label for="estadoTarea">Estado</label>
        <input type="text" class="form-control" name="estadoTarea"  value="{{$tareas->estadoTarea}}">

        @if($errors->has('estadoTarea'))
            <span style='color:red;'> {{ $errors->first('estadoTarea') }} </span>
        @endif 
    </div>
    
    <div class="form-group">
        <label for="fechaCreacion">Fecha Creacion</label>
        <input type="date" class="form-control" name="fechaCreacion"  value="{{$tareas->fechaCreacion}}">

        @if($errors->has('fechaCreacion'))
            <span style='color:red;'> {{ $errors->first('fechaCreacion') }} </span>
        @endif 
    </div>
    


     <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha"  value="{{$tareas->fecha}}">

        @if($errors->has('fecha'))
            <span style='color:red;'> {{ $errors->first('fecha') }} </span>
        @endif 
    </div>
    
    
<div class="form-group row">
    <label for="recomendacionesusuarios_id" class="col-sm-2 col-form-label">Recomendaciones Usuarios</label>
    <div class="col-sm-10">
      <select class="form-control" name="recomendacionesusuarios_id" >
        
        @foreach($recomendacionesUsuarios as $t)

         @if($tareas->recomendacionesusuarios_id == $t->codigoDocumento)
         
        <option value="{{$t->id}}" selected>{{$t->codigoDocumento}}</option>
          @else
          <option value="{{$t->id}}">{{$t->codigoDocumento}}</option>
          @endif
        @endforeach

      </select>
    </div>
    </div>

  <button type="submit" class="btn btn-primary">Modificar</button>
</form>
@endif