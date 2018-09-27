

         <form id="formrecodepartamento"  method="post" > 
                      
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="id" id="idRecomendacionD" hidden >
                          <div class="row">

                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Estado:</b></label>
                                      <input type="text" class="form-control" placeholder="estado" id="recomendacionDestado" name="estado"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback" id="departamento_id">
                                      <label for="departamento_id">Departamento</label>
                                          <select class="form-control" name="departamento_id" id="recomendacionDDepartamentos">
                                              @if(isset($departamento))
                                              @foreach($departamento as $s)
                                                <option value="{{ $s->id}}">{{ $s->descripcion}}</option>                                                
                                              @endforeach
                                              @endif

                                         </select>
                                 
                                  </div>
                                </div>
                                  <div class="col-md-4">
                                  <div class="form-group has-feedback" id="departamento_id">
                                      <label for="recomendacion_id">Recomendacion</label>
                                          <select class="form-control" name="recomendacion_id" id="recomendacionDRecomendacion">
                                              @if(isset($recomendacion))
                                              @foreach($recomendacion as $r)
                                                <option value="{{ $r->id}}">{{ $r->descripcion}}</option>                                                
                                              @endforeach
                                              @endif

                                         </select>
                                 
                                  </div>
                               </div>
                              
                        </div>

                  </form>
     
      