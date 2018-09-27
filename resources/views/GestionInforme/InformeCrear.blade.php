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

<form role="form" method="POST"  enctype="multipart/form-data">

    {{ csrf_field() }} 
    <div class="form-group">
        <label for="fechaAprobacion">Fecha Aprobación</label>
        <input type="date" class="form-control" name="fechaAprobacion" id="informe_fecha" placeholder="Ingrese la fechaAprobacion">

    </div>

    <div class="form-group">
        <label for="memorandoSolicitud">Memorando Solicitud</label>
        <input type="text" class="form-control" name="memorandoSolicitud" id="informe_memorando" placeholder="Ingrese la memorandoSolicitud">

    </div>
    <div class="form-group">
        <label for="temaExamen">Tema Examen</label>
        <input type="text" class="form-control" name="temaExamen" id="informe_tema"  placeholder="Ingrese la temaExamen">

    </div>
   
    <div class="form-group">
        <label for="porcentajeCumplido">%Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplido" id="informe_cumplido"  placeholder="Ingrese la %cumplimiento">

    </div>
    <div class="form-group">
        <label for="observacion">Observación</label>
        <input type="text" class="form-control" name="observacion"  id="informe_Observacion"placeholder="Ingrese la observacion">

    </div>
    <div class="form-group">
        <label for="codigoInforme">Codigo Informe</label>
        <input type="text" class="form-control" name="codigoInforme" id="informe_codigo" placeholder="Ingrese la codigoInforme">

    </div>
    


   <button type="button" class="btn btn-primary btn-lg" onclick="ingresarInforme()"><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
    
</form>
<br>
<br>
