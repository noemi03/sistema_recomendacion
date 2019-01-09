

  <div class="container-fluid spark-screen">
    <div class="row">
        <div class="">
          <div id="app">
              <div class="">
                <!--   <div class="register-logo">
                      <a href="{{ url('/home') }}"><b>Help</b>Desk</a>
                  </div> -->

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
                      
                      <form role="form" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}  
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control"  name="name" id="name"  placeholder="Ingrese la Nombre">
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder=" Ingrese la Apellidos"  >
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control"name="cedula" id="cedula" placeholder="Ingrese la Cedula">
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                            <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <select class="form-control" id="sexo" name="sexo" placeholder="Ingrese la Cedula" >
                                        <option disabled selected>Sexo</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
      
                                     </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" name="celular" id="celular" placeholder="Ingrese la Celular">
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                                 
                              </div>
                              
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}"  name="email"  id="email" >
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-4">
                              <div class="form-group has-feedback">
                                      <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese la Contraseña">
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>

                             </div>
                               
                               
                              <div class="col-md-4">
                              <div class="form-group has-feedback">

                                <select class="form-control" name="tipousuario_id" id="tipousuario_id">
                                  <option disabled selected>Tipo Usuario</option>
                                  @foreach($tipoUsuario as $s)
                                  <option value="{{ $s->id }}">{{ $s->descripciontipo }}</option>
          
                                     @endforeach
                                </select>

                              </div>   
                               </div>
                              <div class="row">
                         
                            <div class="col-md-1">
                                <button type="button" class="btn btn-primary" id="btnU" onclick="ingresarUsuario()">Guardar</button>

                                
                              
                               </div> 

                        </div>

                                                          
                          </div>


  
                  
                  </div><!-- /.form-box -->
              </div><!-- /.register-box -->
                <br>

                  <!-- TABLA DE LISTA DE USUARIOS -->

                 
          </div>




          @include('adminlte::auth.terms')

         
        </div>
    </div>
      

  
      </div>
  </div>


 <script>
              $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>