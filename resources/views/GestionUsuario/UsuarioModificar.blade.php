@if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="register-box-body"  >
                      @if(isset($User))
                      <form role="form" method="POST" action="{{ route('Usuario.update', $User->id) }}" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Nombres" name="name" value="{{ old('name') }}"/>
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"/>
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Cédula" name="cedula" value="{{ old('cedula') }}"/>
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Celular" name="celular" value="{{ old('celular') }}"/>
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                                 
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <select class="form-control" id="sexo" name="sexo" >
                                        <option disabled selected>Sexo</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
      
                                     </select>
                                      <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="estado" name="estado" >
                                        <option disabled selected>Estado</option>
                                        <option >Activo</option>
                                        <option >Inactivo</option>
                                      </select>
                                          
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                          </div>



                          <div class="row">
                            <div class="col-md-4">

                            <div class="form-group has-feedback">
                                <select class="form-control" name="tipoUsuario_id">
                                  @foreach($tipoUsuario as $s)
                                  {{-- <option value="{{ $s->id }}">{{ $s->descripcion}}</option> --}}
                                  @if($User->tipoUsuario_id == $s->id )
                                 <option value="{{ $s->id}}"  selected >{{ $s->descripcion }}</option   >
                                   @else
                                  <option value="{{ $s->id}}">{{ $s->descripcion }}</option>
                                  @endif
                                  @endforeach
                                </select>          
                                   
                            </div>
                           </div>
                              
                               <div class="col-md-4">
                                <div class="form-group has-feedback">
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                                  
                               </div>
                      
                               <div class="col-md-4">
                                 <div class="form-group has-feedback">
                                      <input type="password" class="form-control" placeholder="Contraseña" name="password"/>
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                                  
                               </div>

                              
                          </div>
                          
                          <div class="row">
                              
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" placeholder=" Confirmar contraseña" name="password_confirmation"/>
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                            </div><!-- /.col -->
                               
                               
                               

                          </div>
                        
                      <div class="row">
                            <div class="col-md-3">
                                <label class="lcontainer" style="color: blue; font-size: 14px">Aceptar Terminos y Condiciones
                                       <input type="checkbox" name="terms">
                                      <span class="lcheckmark"></span>
                                </label>
                            </div><!-- /.col -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Ver </button>
                                </div>
                            </div><!-- /.col -->
                            
                      </div>

               </form>
          @endif

      </div><!-- /.form-box -->
           
 <script>
   $(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    });
</script>














































