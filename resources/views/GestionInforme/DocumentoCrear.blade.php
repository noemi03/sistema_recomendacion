<form class="form-control"  enctype="multipart/form-data" id="form_enviarFileD"  method="POST" >
                  {{csrf_field() }}
                  <input type="file" class="form-control-file text-secundary bg-secundary" name="input_file" id="input_file">
                  <br>
                  
                  <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="alertM" style="margin-top: 5px;"  >
                    <strong  >Archivo</strong> cargado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="false">&times;</span>
                    </button>
                  </div>

                 
                 
                 
        </form>


