window.onload=llenarUsuario();

function ingresarUsuario(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            name:$('#name').val(),
            apellidos:$('#apellidos').val(),
            cedula:$('#cedula').val(),
            celular:$('#celular').val(),
            sexo:$('#sexo').val(),
            estado:$('#estado').val(),
            tipoUsuario_id:$('#tipoUsuario_id').val(),
            email:$('#email').val(),
            password:$('#password').val(),
          
        }
        $.ajax({
            url:'Usuario', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarUsuario();
              $('#name').val("");
              $('#apellidos').val("");
              $('#cedula').val("");
              $('#celular').val("");
              $('#sexo').val("");
              $('#estado').val("");
              $('#tipoUsuario_id').val("");
              $('#email').val("");
              $('#password').val("");
             
            },
            complete: function(){
               
            }
        });
}


function llenarUsuario(){
   
        $.get('UsuarioCargar', function (data) { 
             $('#tablaUsuario').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaUsuario').append(
                    '<tr>'+
                        '<td>'+item.name+'</td>'+
                        '<td>'+item.apellidos+'</td>'+
                        '<td>'+item.cedula+'</td>'+
                        '<td>'+item.sexo+'</td>'+
                        '<td>'+item.celular+'</td>'+
                        '<td>'+item.email+'</td>'+
                        '<td>'+item.estado+'</td>'+
                        '<td>'+item.tipo_usuariov2.descripcion+'</td>'+
                        '<td>'+
                          '<button type="button" class="btn btn-success btn-sm " onclick="editarUsuario('+item.id+')"><i class="fa fa-edit"></i></button>  '+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarUsuario('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-warning btn-sm" onclick="mostrar_departamento_usuarios('+item.id+')"><i class="fa fa-building-o"></i></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}

// function otrafuncion(id){
//   //llamas moda
//   //pasas el id --a una etiqueta  hidden

//   //esa modal tiene una tabla

// }




 function eliminarUsuario(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'Usuario/' + id,
            success: function (data) {
              
           llenarUsuario();
                
               
            },  
        });
 }


function editarUsuario(id){
        $.get('Usuario/'+id+'/edit', function (data) {
 
              $('#name').val(data.name);
              $('#apellidos').val(data.apellidos);
              $('#cedula').val(data.cedula);
              $('#sexo').val(data.sexo);
              $('#celular').val(data.celular);
              $('#email').val(data.email);
              $('#password').val(data.password);
              $('#estado').val(data.estado);
              $('#tipoUsuario_id').val(data.tipoUsuario_id);
              $('#btnU').attr('class','btn btn-warning');
              $('#btnU').html("modificar");
              $('#btnU').attr('onclick','ActualizarUsuario('+id+')');
            
        });
}



function ActualizarUsuario(id){
        if ($('#name').val()=='') {return;}
        if ($('#apellidos').val()=='') {return;}
        if ($('#cedula').val()=='') {return;}
        if ($('#sexo').val()=='') {return;}
        if ($('#celular').val()=='') {return;}
        if ($('#email').val()=='') {return;}
        if ($('#password').val()=='') {return;}
        if ($('#estado').val()=='') {return;}
        if ($('#tipoUsuario_id').val()=='') {return;}

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            name:$('#name').val(),
            apellidos:$('#apellidos').val(),
            cedula:$('#cedula').val(),
            sexo:$('#sexo').val(),
            celular:$('#celular').val(),
            email:$('#email').val(),    
            password:$('#password').val(),
            estado:$('#estado').val(), 
            tipoUsuario_id:$('#tipoUsuario_id').val(),
              
        }
        $.ajax({
            url:'Usuario/'+id, // Url que se envia para la solicitud
            type:'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
              llenarUsuario();
                 $('#btnU').attr('class','btn btn-primary ');
                 $('#btnU').attr('onclick','ingresarUsuario()');
                 $('#btnU').html("Guardar");

                  $('#name').val("")
                       $('#apellidos').val("")
                    $('#cedula').val("")
                  $('#sexo').val("")
                     $('#celular').val("")
                   $('#email').val("")   
                      $('#password').val("")
                    $('#estado').val("")
                         
            }
        });
}
///////////////////////////////////METODOS DE LA TABLA DEPARTAMENTO USUARIOS ///////////////////////////////////
function mostrar_departamento_usuarios(id){
    $('#mostralmodal').modal('show');
     $('#idDU').val(id);
    llenarDepartamentoUsuario(); 
    mostrarDepartamentoUsuarios(id);

      
}

function llenarDepartamentoUsuario(){
    
    $.get('DepartamentoCargar', function (data) { 
         $('#tablaasignardepartamentoalusuario').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablaasignardepartamentoalusuario').append(
                '<tr>'+
                    '<td hidden >'+item.id+'</td>'+
                    '<td >'+item.descripcion+'</td>'+
                    '<td hidden id="n'+item.id+'" ></td>'+
                    '<td>'+
                    '<input type="checkbox" class="form-check-input" id="exampleCheck2'+item.id+'" onclick="(agregarControlUsuario('+item.id+'))"/>'+
                    '<label class="form-check-label" for="exampleCheck2"  ></label>'+
                    '</td>'+
                '</tr>'
            );
     });
    }); 
}

function agregarControlUsuario(id){
  if( $('#exampleCheck2'+id).is(':checked') ) {
      $('#n'+id).html(0);
  }  
}



/*FUNCION PARA INGRESAR LOS DEPARTAMENTO A LOS USUARIOS*/


function ingresarDepartamentoUsuarios(){ 
    
    //recorremos la tabla para capturar los datos
     $('#tablaasignardepartamentoalusuario tr').each(function () {
         control = $(this).find("td").eq(2).html();
         iddepartamentos = $(this).find("td").eq(0).html();
         estado_d= $('#departamentoUsuario_estado').val();
         horaentrada_u= $('#departamentoUsuario_horaEntrada').val();
         horasalida_u= $('#departamentoUsuario_horaSalida').val();
         idusuario_t=$('#idDU').val();
        if (control =='0') {
           
           $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           var FrmData = {
               estado:estado_d,
               horarioEntrada:horaentrada_u,
               horarioSalida:horasalida_u,
               iddepartamento:iddepartamentos,
               idusuario:idusuario_t,
           }
           $.ajax({
               url: 'Departamentouser', // Url que se envia para la solicitud esta en el web php es la ruta
               method: "POST",             // Tipo de solicitud que se enviará, llamado como método
               data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
               success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
               {
            
                       mostrarDepartamentoUsuarios( $('#idDU').val());
                   //eliminarRecomendacionDepartamento();
               },
               complete: function(){
                      
                }
           });
        }

    });
     llenarDepartamentoUsuario(); 
}


/*MOSTRAR TODOS LOS DEPARTAMENTO A LOS USUARIOS*/
function mostrarDepartamentoUsuarios(id){

    $.get('DepartamentouserMostrar/'+id, function (data) { 
        $("#tabla_Usuariodepartamento").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaDepartamentoUsuario(item); // carga los datos en la tabla
        });      
    });
    
}



function eliminarDepartamentoUsuario(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Departamentouser/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarDepartamentoUsuarios( $('#idDU').val()); // carga los datos en la tabla                       
        }
    });
}



/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaDepartamentoUsuario(data){
  //debugger
    $("#tabla_Usuariodepartamento").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.estado+"</td>\
         <td>"+ data.horarioEntrada+"</td>\
         <td>"+ data.horarioSalida+"</td>\
         <td>"+ data.departamento_v3.descripcion+"</td>\
         <td>"+ data.usuario_v3.name+"</td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarDepartamentoUsuario("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}