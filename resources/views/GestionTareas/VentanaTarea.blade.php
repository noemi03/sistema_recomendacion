
         <form id="formregistromodal"  method="post"> 
                      
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="id" id="idTarea" hidden >
                          <div class="row">

                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Descripción:</b></label>
                                      <input type="text" class="form-control" placeholder="Descripción" id="tarea_d" name="descripcionTarea"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Porcentaje Cumplimiento:</b></label>
                                      <input type="text" class="form-control" placeholder="Porcentaje Cumplimiento" id="tarea_p" name="porcentajeCumplimientotarea"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Estado:</b></label>
                                      <input type="text" class="form-control" placeholder="Porcentaje Equivalente" id="tarea_e" name="estadoTarea"required />
                                  </div>
                              </div>

                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Fecha Creacion:</b></label>
                                      <input type="datetime" class="form-control" placeholder="Fecha Creacion" id="tarea_fC" name="fechaCreacion"required />
                                  </div>
                              </div>

                              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="fecha">Fecha</label>
                      <input type="datetime" class="form-control" id="tarea_f"   name="fecha">
                  </div>
                  </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback" id="tarea_r">
                                      <label for="recomendacionesusuarios_id">Recomendaciones Usuarios</label>
                                          <select class="form-control" name="recomendacionesusuarios_id" id="tarea_recomendacionesusuarios_id">
                                              @if(isset($recomendacionesUsuarios))
                                              @foreach($recomendacionesUsuarios as $s)
                                                <option value="{{ $s->id}}">{{ $s->codigoDocumento}}</option>                                                
                                              @endforeach
                                              @endif

                                         </select>
                                 
                                  </div>
                               </div>
                        </div>

                  </form>
      
