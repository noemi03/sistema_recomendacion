         <form id="formregistromodal"  method="post"> 
              <input type="text" name="id" id="idActividad" hidden >
              <div class="row">

              <div class="col-md-4">
                 <div class="form-group has-feedback">
                    <label> <b>Descripción:</b></label>
                    <input type="text" class="form-control" placeholder="Descripción" id="descripcionA" name="descripcionActividad"required />
                 </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="fecha">Fecha</label>
                      <input type="date" class="form-control" id="fechaF"   name="fecha">
                  </div>
                  </div>
              <div class="col-md-4">
                        <div class="form-group has-feedback">
                                   <label for="tarea_id" class="col-sm-2 col-form-label">TAREA</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="TareaA"   name="tarea_id"required/>
                                       @if(isset($tareas))
                                      @foreach($tareas as $t)
                                      <option value="{{$t->id}}" selected>{{$t->descripcionTarea}}</option>
                                        
                                      @endforeach
                                      @endif

                                </select>
                              </div>
                            </div>
                                 
             </div>
         </form>
