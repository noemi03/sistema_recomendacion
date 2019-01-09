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

    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="fechaAprobacion">Fecha Aprobación</label>
        <input type="date" class="form-control" name="fechaAprobacion" id="informe_fecha" placeholder="Ingrese la fechaAprobacion">
    </div>
    </div>
    </div>


    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="fechaLimite">Fecha Limite</label>
        <input type="date" class="form-control" name="fechaLimite" id="informe_fechaLimite" placeholder="Ingrese la fecha limite">
        
    </div>
    </div>
    </div>

    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="memorandoSolicitud">Memorando Solicitud</label>
        <input type="text" class="form-control" name="memorandoSolicitud" id="informe_memorando" placeholder="Ingrese la memorandoSolicitud">
    </div>
    </div>
    </div>


    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="temaExamen">Tema Examen</label>
        <input type="text" class="form-control" name="temaExamen" id="informe_tema"  placeholder="Ingrese la temaExamen">

    </div>
    </div>
    </div>
   
    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="porcentajeCumplido">%Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplido" id="informe_cumplido"  placeholder="Ingrese la %cumplimiento">

    </div>
    </div>
    </div>

 <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="codigoInforme">Codigo Informe</label>
        <input type="text" class="form-control" name="codigoInforme" id="informe_codigo" placeholder="Ingrese la codigoInforme">
    
    </div>
    </div>
    </div>

<div class="col-md-4 ">
   <div class="panel " >
    <div class="form-group">
        <label for="tipoInforme_id">Tipo Informe</label>
        <select class="form-control" name="tipoInforme_id" id="informe_tipo">
            
        @foreach($tipoInforme as $s)
               
               <option value="{{ $s->id }}">{{ $s->tipoInforme}}</option>
         
           @endforeach
           
       </select>

     </div>
    </div> 
    </div> 
     <div class="col-md-4 ">
        <div class="panel " >
         <div class="form-group">
            <br>
        <button type="button" class="btn btn-primary " onclick="ingresarInforme()">Almacenar</button>
     </div>
    </div>   
    </div>
    
    </div>   
    </div>

 

</form>
<br>
<br>
