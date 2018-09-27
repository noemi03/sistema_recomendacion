      <div class="modal-body">
         <form id="formregistromodal"  method="post"> 
                      
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="id" id="idavance" hidden >
                          <div class="row">

                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Descripción:</b></label>
                                      <input type="text" class="form-control" placeholder="Descripción" id="descripcionavance" name="descripcionAV"required />
                                  </div>
                                </div>

                              <div class="col-md-4">
                                  <div class="form-group has-feedback" id="actividad_Id">
                                      <label for="actividad_Id">Actividad</label>
                                          <select class="form-control" name="actividad_Id" id="actividad_Idavance1">
                                              @if(isset($actividad))
                                              @foreach($actividad as $s)
                                                <option value="{{ $s->id}}">{{ $s->descripcionA }}</option>                                                
                                              @endforeach
                                              @endif

                                         </select>
        
                                 
                                  </div>
                               </div>
                           <div class="row">
                        
                               <div class="col-md-4">
                                  <div class="form-group has-feedback" id="estado_id" >
                                      <label> <b>Estado:</b></label>
                                      <select class="form-control" required name="estado_idavance" id="estado_idavance" >
                                          @if(isset($estado))
                                            @foreach($estado as $s)
                                              <option value="{{ $s->id}}">{{ $s->descripcion}}</option>                                                
                                            @endforeach
                                          @endif
                                      </select>      
                                  </div>
                               </div>
                          </div>

                      </form>
      </div>
      
 
