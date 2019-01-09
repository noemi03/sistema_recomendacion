window.onload=mostrarUsuario();

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
            tipousuario_id:$('#tipousuario_id').val(),
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
              mostrarUsuario();
              $('#name').val("");
              $('#apellidos').val("");
              $('#cedula').val("");
              $('#celular').val("");
              $('#sexo').val("");
              $('#estado').val("");
              $('#tipousuario_id').val("");
              $('#email').val("");
              $('#password').val("");
             
            },
            complete: function(){
               
            }
        });
}


function mostrarUsuario(){
    $.get('UsuarioMostrar', function (data) {
        $("#tablaUsuario").html("");
        $.each(data, function(i, item) { //recorre el data 
          cargartablaIusuario(item); // carga los datos en la tabla
        });      
    });
    
}




function  cargartablaIusuario(data){
  //debugger
    $("#tablaUsuario").append(
        "<tr id='fila_cod"+"'>\
        <td>"+ data.name+"</td>\
        <td>"+ data.apellidos+"</td>\
        <td>"+ data.cedula+"</td>\
        <td>"+ data.sexo+"</td>\
        <td>"+ data.celular+"</td>\
        <td>"+ data.email+"</td>\
        <td>"+ data.estado+"</td>\
        <td>"+ data.tipo_usuariov2.descripciontipo+"</td>\
        <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarUsuariomodal' onClick='prepararactualizarusuario("+data.id+")'><i class='fa fa-edit'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='mostrarmodal("+data.id+")'><i class='fa fa-trash'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='mostrar_cargos_usuarios("+data.id+")'><i class='fa fa-building-o'></i></button></td>\
        </tr>"
    );

    
}



// function otrafuncion(id){
//   //llamas moda
//   //pasas el id --a una etiqueta  hidden

//   //esa modal tiene una tabla

// }

 function eliminarUsuario(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'eliminarusuario/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function ()   // Una función a ser llamada si la solicitud tiene éxito
        {  
         alertify.success("Datos eliminados correctamente"); 
          mostrarUsuario(); // carga los datos en la tabla                       
        }
    });
}
function mostrarmodal (valor){
  
    $("#mi-modal").modal('show');
    $("#modal-btn-si").on("click", function(){
        eliminarUsuario(valor);
        $("#mi-modal").modal('hide');
    });
      
    $("#modal-btn-no").on("click", function(){
        $("#mi-modal").modal('hide');
      });
  }

 /*MUESTRA LOS DATOS DEL INFORME SELECCIONADO  EN EL MODAL */
function prepararactualizarusuario(id){
   
    $.get('preparactualizarUsuario/'+id,function(data){
         
        $('#id_usuario').val(data.id);
        $('#Mnombre').val(data.name);
        $('#MApellidos').val(data.apellidos);
        $('#Mcedula').val(data.cedula); 
        $('#Msexo').val(data.sexo);
        $('#Mcelular').val(data.celular);
        $('#Memail').val(data.email);   
        $('#Mcontraseña').val(data.password);
        $('#Mestado').val(data.estado);  
        $('#Mtipousuario').val(data.tipousuario_id);     
                        
    });
}


function UsuarioUpdate(){ 
   var FrmData = {
        id: $('#id_usuario').val(),
        name:$('#Mnombre').val(),
       apellidos: $('#MApellidos').val(),
        cedula:$('#Mcedula').val(),
       sexo:$('#Msexo').val(),
        celular:$('#Mcelular').val(),
        email:$('#Memail').val(),
       password:$('#Mcontraseña').val(),
        estado:$('#Mestado').val(),
        tipousuario_id:$('#Mtipousuario').val(),

     
    
    }
    console.log(FrmData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Usuario/'+ $('#id_usuario').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarUsuario(); 
            limpiar();
          
           
        },
        
       

    });  
}

function limpiar(){
    $('#Mnombre').val("");
    $('#MApellidos').val("");
    $('#Mcedula').val("");
    $('#Mcelular').val("");
    $('#Memail').val("");
    $('#Mcontraseña').val("");
  
   
}



///////////////////////////////////METODOS DE LA TABLA DEPARTAMENTO USUARIOS ///////////////////////////////////
function mostrar_cargos_usuarios(id){
    $('#mostralmodal').modal('show');
     $('#idCU').val(id);
    llenarCargoUsuario(); 
    mostrarCargoUsuarios(id);

      
}

function llenarCargoUsuario(){
    
    $.get('CargosCargar', function (data) { 
         $('#tablaasignarcargosalusuario').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablaasignarcargosalusuario').append(
                '<tr>'+
                    '<td hidden >'+item.id+'</td>'+
                    '<td >'+item.descripcionCargo+'</td>'+
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



function ingresarCargosUsuarios(){ 
    
    //recorremos la tabla para capturar los datos
     $('#tablaasignarcargosalusuario tr').each(function () {
         control = $(this).find("td").eq(2).html();
         idcargo = $(this).find("td").eq(0).html();
         estado_c= $('#cargousuario_estadoCargo').val();
         fechaInicio_u= $('#cargousuario_fechaInicio').val();
         fechaFin_u= $('#cargousuario_fechaFin').val();
         idusers=$('#idCU').val();
        if (control =='0') {
           
           $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           var FrmData = {
            estadoCargo:estado_c,
            fechaInicio:fechaInicio_u,
            fechaFin:fechaFin_u,
            cargos_id:idcargo,
            users_id:idusers,
           }
           $.ajax({
               url: 'CargoUsuario', // Url que se envia para la solicitud esta en el web php es la ruta
               method: "POST",             // Tipo de solicitud que se enviará, llamado como método
               data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
               success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
               {
            
                       mostrarCargoUsuarios( $('#idCU').val());
                   //eliminarRecomendacionDepartamento();
               },
               complete: function(){
                      
                }
           });
        }

    });
     llenarCargoUsuario(); 
}


/*MOSTRAR TODOS LOS DEPARTAMENTO A LOS USUARIOS*/
function mostrarCargoUsuarios(id){

    $.get('CargosUsuariosMostrar/'+id, function (data) { 
        $("#tabla_UsuarioCargo").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaCargoUsuario(item); // carga los datos en la tabla
        });      
    });
    
}



function eliminarCargoUsuario(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'CargoUsuario/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarCargoUsuarios( $('#idCU').val()); // carga los datos en la tabla                       
        }
    });
}



/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaCargoUsuario(data){
  //debugger
    $("#tabla_UsuarioCargo").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.estadoCargo+"</td>\
         <td>"+ data.fechaInicio+"</td>\
         <td>"+ data.fechaFin+"</td>\
         <td>"+ data.cargos_v2.descripcionCargo+"</td>\
         <td>"+ data.usuarios_v2.name+"</td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarCargoUsuario("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}