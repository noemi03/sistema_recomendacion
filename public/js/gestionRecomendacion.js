window.onload=mostrarRecomendaciones();
/*FUNCION PARA INGRESAR LOS SUBTEMA*/

function ingresarRecomendaciones(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcionRecomendacion:$('#R_descripcion').val(),
        porcentajeCumplimiento: $('#R_cumplimiento').val(),
        estadoRecomendacion: $('#R_estado').val(),
        subtema_id: $('#R_subtema').val(),
        
    
    }
    $.ajax({
        url: 'Recomendacion', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarRecomendaciones();      
            limpiarRecomendacion();
        },
        complete: function(){
               
            }
    });  
}


/*MOSTRAR TODOS LO SUBTEMA*/
function mostrarRecomendaciones(){
    $.get('RecomendacionesMostrar', function (data) {
        $("#tablaRecomendaciones").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaRecomendaciones(item); // carga los datos en la tabla
        });      
    });
    
}

 
function eliminarRecomendaciones(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Recomendacion/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
         mostrarRecomendaciones(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL SUBTEMA SELECCIONADO  EN EL MODAL */
function prepararactualizarRecomendaciones(id){
   
    $.get('prepararactualizarrecomendaciones/'+id,function(data){
        $('#idRecomendaciones').val(data.id);
        $('#recomendaciones_d').val(data.descripcionRecomendacion);
        $('#recomendaciones_p').val(data.porcentajeCumplimiento); 
        $('#recomendaciones_e').val(data.estadoRecomendacion);
        $('#recomendaciones_sub').val(data.subtemas_v2.id);
                             
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL SUBTEMA*/
function RecomendacionesUpdate(){ 
    var FrmData = {
         id:$('#idRecomendaciones').val(),
         descripcionRecomendacion:$('#recomendaciones_d').val(),
         porcentajeCumplimiento:$('#recomendaciones_p').val(),
         estadoRecomendacion:$('#recomendaciones_e').val(),
         subtema_id:$('#recomendaciones_sub').val(),
        
        }
 
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url:'Recomendacion/'+ $('#idRecomendaciones').val(), // Url que se envia para la solicitud esta en el web php es la ruta
         method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
         data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
         success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
         {
             mostrarRecomendaciones(); 
             //limpiarRecomendacion();
         },
        
     });  
 }
 
 /*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
 function limpiarRecomendacion(){
     $('#R_descripcion').val('');
     $('#R_cumplimiento').val('');
     $('#R_estado').val('');
     }
   /*  
function limpiarsubtemaupdate(){
    $('#DescripcionSubtema').val("");
    $('#subtemaconclusion').val("");
    $('#subtemacumplimiento').val("");
    $('#EstadoSubtema').val("");
   
}

*/
/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaRecomendaciones(data){
  
    $("#tablaRecomendaciones").append(
        "<tr id='fila_cod"+"'>\
        <td>"+ data.descripcionRecomendacion+"</td>\
        <td>"+ data.porcentajeCumplimiento+"</td>\
        <td>"+ data.estadoRecomendacion+"</td>\
        <td>"+ data.subtemas_v2.descripcionSubtema+"</td>\
        <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarRecomendacionesmodal'onClick='prepararactualizarRecomendaciones("+data.id+")'><i class='fa fa-edit'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarRecomendaciones("+data.id+")'><i class='fa fa-trash'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-warning' data-toggle='modal' onClick='mostrar_recomendaciones_usuarios("+data.id+")'><i class='fa fa-building-o'></i></button></td>\
        </tr>"
   );
}


function mostrar_recomendaciones_usuarios(id){
    $('#mostralmodal').modal('show');
     $('#idRU').val(id);
    llenarRecomendacionesUsuarios(); 
    mostrarRecomendacionesUsuarios(id);
     
}


function llenarRecomendacionesUsuarios(){
    
    $.get('CargarUsuarios', function (data) { 
         $('#tablaasignarrecomendacionesalusuario').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablaasignarrecomendacionesalusuario').append(
                '<tr>'+
                    '<td hidden >'+item.id+'</td>'+
                    '<td >'+item.name+'</td>'+
                    '<td hidden id="n'+item.id+'" ></td>'+
                    '<td>'+
                    '<input type="checkbox" class="form-check-input" id="exampleCheck2'+item.id+'" onclick="(agregarControlUsuarioR('+item.id+'))"/>'+
                    '<label class="form-check-label" for="exampleCheck2"  ></label>'+
                    '</td>'+
                '</tr>'
            );
     });
    }); 
}


function agregarControlUsuarioR(id){
    if( $('#exampleCheck2'+id).is(':checked') ) {
        $('#n'+id).html(0);
    }  
  }




  function ingresarRecomendacionesUsuarios(){ 
    
    //recorremos la tabla para capturar los datos
     $('#tablaasignarrecomendacionesalusuario tr').each(function () {
         control = $(this).find("td").eq(2).html();
         idusuario = $(this).find("td").eq(0).html();
         estado_ru= $('#RecoUser_Estado').val();
         cumplimiento_ru= $('#RecoUser_PCumplimiento').val();
         fechaInicial_ru= $('#RecoUser_FInicial').val();
         fechaFinal_ru= $('#RecoUser_FFinal').val();
         documento_ru= $('#RecoUser_Documento').val();
         codigoDocumento_ru= $('#RecoUser_codigo').val();
         idrecomendaciones=$('#idRU').val();
        if (control =='0') {
           
           $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           var FrmData = {
            estadoRecomendacionUsuario:estado_ru,
            porcentajeCumplimiento:cumplimiento_ru,
            fechaInicio:fechaInicial_ru,
            fechaFin:fechaFinal_ru,
            documento:documento_ru,
            codigoDocumento:codigoDocumento_ru,
            users_id:idusuario,
            recomendacion_id:idrecomendaciones,
           }
           $.ajax({
               url: 'RecomendacionUsuario', // Url que se envia para la solicitud esta en el web php es la ruta
               method: "POST",             // Tipo de solicitud que se enviará, llamado como método
               data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
               success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
               {
            
                       mostrarRecomendacionesUsuarios( $('#idRU').val());
                       limpiarRecomendacionesUsuarios();
               },
               complete: function(){
                      
                }
           });
        }

    });
     llenarRecomendacionesUsuarios(); 
}



function mostrarRecomendacionesUsuarios(id){

    $.get('RecomendacionesUsuariosMostrar/'+id, function (data) { 
        $("#tabla_RecomendacionesUsuarios").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaRecomendacionesUsuarios(item); // carga los datos en la tabla
        });      
    });
    
}


function limpiarRecomendacionesUsuarios(){
    $('#RecoUser_Estado').val('');
    $('#RecoUser_PCumplimiento').val('');
    $('#RecoUser_FInicial').val('');
    $('#RecoUser_FFinal').val('');
    $('#RecoUser_Documento').val('');
    $('#RecoUser_codigo').val('');
    }
  

    

function eliminarRecomendacionesUsuarios(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'RecomendacionUsuario/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarRecomendacionesUsuarios( $('#idRU').val()); // carga los datos en la tabla                       
        }
    });
}

function cargartablaRecomendacionesUsuarios(data){
    //debugger
      $("#tabla_RecomendacionesUsuarios").append(
          "<tr id='fila_cod"+"'>\
          <td>"+ data.estadoRecomendacionUsuario+"</td>\
           <td>"+ data.porcentajeCumplimiento+"</td>\
           <td>"+ data.fechaInicio+"</td>\
           <td>"+ data.fechaFin+"</td>\
           <td>"+ data.documento+"</td>\
           <td>"+ data.codigoDocumento+"</td>\
          <td>"+ data.recomendaciones_v2.descripcionRecomendacion+"</td>\
          <td>"+ data.usuarios_v2.name+"</td>\
          <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarRecomendacionesUsuarios("+data.id+")'><i class='fa fa-trash'></i></button></td>\
          </tr>"
      );
  }
  