
<div class="modal-body">

<form id="frm_recom_editar"  role="form" method="POST" action="" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" name="descripcion" id="recom_edit_descripcion"  value="">
    </div>
    <div class="form-group">
        <label for="porcentajeCumplimiento">%Cumplimiento</label>
        <input type="text" class="form-control" name="porcentajeCumplimiento" id="recom_edit_cumplimiento" value="">
    </div>
    
    <div class="form-group">
        <label for="subtema_id">Subtema</label>
        <select class="form-control" id="rec_edit_subtema" name="subtema_id">
            @foreach($subtema as $s)
                <option value="{{ $s->id }}">{{ $s->descripcion}}</option>         
            @endforeach
       </select>
    </div>

    <div class="form-group">
        <label for="estado_id">Estado</label>
        <select class="form-control" name="estado_id" id="rec_edit_estado">
            @foreach($estado as $s)
                <option value="{{ $s->id }}">{{ $s->descripcion}}</option>            
            @endforeach
       </select>

    </div>
    
    <div class="form-group">
        <label for="tiporecomendaciones_id">Tipo Recomendacion</label>
        <select class="form-control" name="tiporecomendaciones_id" id="rec_edit_tipoRecomendacion">
            @foreach($tipoR as $s)
                <option value="{{ $s->id }}">{{ $s->descripcion}}</option>
            @endforeach
       </select>

    </div>

  <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i></button>
</form>
  </div>