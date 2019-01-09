
         <form id="formregistromodal"  method="post"> 
                      
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="text" name="id" id="idRecomendaciones" hidden >
                      <div class="row">

                          <div class="col-md-4">
                              <div class="form-group has-feedback">
                                  <label> <b>Descripción:</b></label>
                                  <input type="text" class="form-control" placeholder="Descripcion" id="recomendaciones_d" name="descripcionRecomendacion"required />
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group has-feedback">
                                  <label> <b>Porcentaje Cumplimiento:</b></label>
                                  <input type="text" class="form-control" placeholder="Porcentaje Cumplimiento" id="recomendaciones_p" name="porcentajeCumplimiento"required />
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group has-feedback">
                                  <label> <b>Estado:</b></label>
                                  <input type="text" class="form-control" placeholder="Porcentaje Equivalente" id="recomendaciones_e" name="estadoRecomendacion"required />
                              </div>
                          </div>

                         
                          <div class="col-md-4">
                              <div class="form-group has-feedback" id="recomendaciones_sub">
                                  <label for="subtema_id">subtemas</label>
                                      <select class="form-control" name="subtema_id" id="recomendaciones_sub">
                                          @if(isset($subtemas))
                                          @foreach($subtemas as $s)
                                            <option value="{{ $s->id}}">{{ $s->descripcionSubtema}}</option>                                                
                                          @endforeach
                                          @endif
                                     </select>
                             
                              </div>
                           </div>
                    </div>

              </form>
  
