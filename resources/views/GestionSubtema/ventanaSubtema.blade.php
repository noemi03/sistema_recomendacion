     <form id="formregistromodal"  method="post"> 
              <input type="text" name="id" id="idSubtema" hidden >
              <div class="row">

              <div class="col-md-4">
                 <div class="form-group has-feedback">
                    <label> <b>Descripción:</b></label>
                    <input type="text" class="form-control" placeholder="Descripción" id="SubtemaDescripcion" name="descripcion"required />
                 </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="conclusion">Conclusion</label>
                      <input type="text" class="form-control" id="subtemaconclusion" name="conclusion">
                  </div>
              </div>
               <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="porcentajeCumplido">Complimiento</label>
                      <input type="text" class="form-control" id="subtemacumplimiento" name="porcentajeCumplido">
                  </div>
              </div>
              <div class="col-md-4">
                        <div class="form-group has-feedback">
                                   <label for="informe_id" class="col-sm-2 col-form-label">TEMA DEL INFORME</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="subtemainforme"   name="informe_id"required/>
                                       @if(isset($informe))
                                      @foreach($informe as $t)
                                      <option value="{{$t->id}}" selected>{{$t->temaExamen}}</option>
                                        
                                      @endforeach
                                      @endif

                                </select>
                              </div>
                            </div>
                                 
             </div>
             <div class="col-md-4">
                        <div class="form-group has-feedback">
                                   <label for="informe_id" class="col-sm-2 col-form-label">CODIGO DEL INFORME</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="subtemacodigoI"   name="informe_id"required/>
                                       @if(isset($informe))
                                      @foreach($informe as $t)
                                      <option value="{{$t->id}}" selected>{{$t->codigoInforme}}</option>
                                        
                                      @endforeach
                                      @endif

                                </select>
                              </div>
                            </div>
                                 
             </div>
         </form>
