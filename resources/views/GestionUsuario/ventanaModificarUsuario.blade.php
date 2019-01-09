<form id="formregistromodal"  method="post"> 
              <input type="text" name="id" id="id_usuario" hidden >
              <div class="row">

              <div class="col-md-4">
                 <div class="form-group has-feedback">
                    <label> <b>Nombre</b></label>
                    <input type="text" class="form-control" id="Mnombre" placeholder="Nombres" name="name"required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="form-group has-feedback">
                    <label> <b>Apellidos</b></label>
                    <input type="text" class="form-control" id="MApellidos" placeholder="Apellidos" name="apellidos"required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                 </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label> <b>Cedula</b></label>
                      <input type="text" class="form-control" id="Mcedula" placeholder="Cédula" name="cedula" />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
              </div>
               
            <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label> <b>Sexo</b></label>
                      <select class="form-control" id="Msexo" name="sexo" >
                                        <option disabled selected>Sexo</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
      
                                     </select>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label> <b>Celular</b></label>
                      <input type="text" class="form-control" id="Mcelular"placeholder="Celular" name="celular"required  />
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" id="Memail" name="email"required />
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="Contraseña">Contraseña</label>
                      <input type="password" class="form-control"  id="Mcontraseña" placeholder=" Confirmar contraseña" name="password_confirmation"/>
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
              </div>
              <input type="text" name="estado" id="Mestado" hidden >
              
              <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="tipousuario_id" class="col-sm-2 col-form-label">Tipo Informe</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" id="Mtipousuario"   name="tipousuario_id"required/>
                                       @if(isset($tipoUsuario))
                                      @foreach($tipoUsuario as $t)
                                      <option value="{{$t->id}}" selected>{{$t->descripciontipo}}</option>
                                        
                                      @endforeach
                                      @endif

                                </select>
                              </div>
                            </div>
                                 
             </div>


            
              

              
              
             </div>
             
         </form>
