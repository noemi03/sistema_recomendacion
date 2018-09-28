
         <form id="formregistromodal"  method="post"> 
                      
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="id" id="idTarea" hidden >
                          <div class="row">

                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Descripción:</b></label>
                                      <input type="text" class="form-control" placeholder="Descripción" id="tareadescripcion" name="descripcion"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Porcentaje Cumplimiento:</b></label>
                                      <input type="text" class="form-control" placeholder="Porcentaje Cumplimiento" id="tareaporcentajeCumplimiento" name="porcentajeCumplimiento"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Porcentaje Equivalente:</b></label>
                                      <input type="text" class="form-control" placeholder="Porcentaje Equivalente" id="tareaporcentajeEquivalente" name="porcentajeEquivalente"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback" id="recomendacionesDepartamentoid">
                                      <label for="recomendacionesDepartamentoid">Actividad</label>
                                          <select class="form-control" name="recomendacionesDepartamentoid" id="tarearecope">
                                              @if(isset($reco))
                                              @foreach($reco as $s)
                                                <option value="{{ $s->id}}">{{ $s->estado}}</option>                                                
                                              @endforeach
                                              @endif

                                         </select>
                                 
                                  </div>
                               </div>
                        </div>

                  </form>
      
