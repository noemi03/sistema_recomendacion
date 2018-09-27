
      <form role="form" method="POST"  enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->
    <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado" id="recomendacion_d_estado"  placeholder="Ingrese la estado">

    </div>
    
    <div class="form-group">
        <label for="departamento_id">Departamento</label>
        <select class="form-control"  id="recomendacion_d_departamento"   name="departamento_id">
            @foreach($departamento as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcion}}</option>
          
            @endforeach
       </select>
       
    </div>
    
     <div class="form-group">
        <label for="recomendacion_id">Recomendacion</label>
        <select class="form-control"  id="recomendacion_d_recomendacion"  name="recomendacion_id">
            @foreach($recomendacion as $s)
               
                <option value="{{ $s->id }}">{{ $s->descripcion }}</option>
          
            @endforeach
       </select>

       
    </div>
  

  <button type="button" class="btn btn-primary" onclick="ingresarRecomendacionDepartamento()">Guardar</button>
</form>
