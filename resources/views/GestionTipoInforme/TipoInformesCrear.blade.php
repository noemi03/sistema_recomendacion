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

<form role="form" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->
    <div class="form-group">
        <label for="tipoInforme">TIPO DE INFORME </label>
        <input type="text" class="form-control" name="tipoInforme" id="descripcion" placeholder="Ingrese la tipo de informe">

        @if($errors->has('tipoInforme'))
            <span style='color:red;'> {{ $errors->first('tipoInforme') }} </span>
        @endif 
    </div>

    

  <button type="button" class="btn btn-primary  btn-lg" id="btnTI" onclick="ingresarTInforme()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
</form>