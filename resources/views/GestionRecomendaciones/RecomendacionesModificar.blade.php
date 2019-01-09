
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


@if(isset($recomendaciones))
<form role="form" method="POST" action="{{route('Recomendacion.update',$recomendaciones->id) }}" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcionRecomendacion">Descripción</label>
        <input type="text" class="form-control" name="descripcionRecomendacion"  value="{{$recomendaciones->descripcionRecomendacion}}">
      
    </div>

    <div class="form-group">
        <label for="porcentajeCumplimiento">Porcentaje Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplimiento"  value="{{$recomendaciones->porcentajeCumplimiento}}">
      
    </div>

    <div class="form-group">
        <label for="estadoRecomendacion">Estado</label>
        <input type="text" class="form-control" name="estadoRecomendacion"  value="{{$recomendaciones->estadoRecomendacion}}">
       
    </div>
    
        
<div class="form-group row">
    <label for="subtema_id" class="col-sm-2 col-form-label">Subtemas</label>
    <div class="col-sm-10">
      <select class="form-control" name="subtema_id" >
        
        @foreach($subtemas as $t)

         @if($recomendaciones->subtema_id == $t->descripcionSubtema)
         
        <option value="{{$t->id}}" selected>{{$t->descripcionSubtema}}</option>
          @else
          <option value="{{$t->id}}">{{$t->descripcionSubtema}}</option>
          @endif
        @endforeach

      </select>
    </div>
    </div>

 
 <button type="submit" class="btn btn-primary">Modificar</button>
</form>
@endif