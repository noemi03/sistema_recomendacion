window.onload=mostrarSubtema();
/*FUNCION PARA INGRESAR LOS SUBTEMA*/

function ingresarSubtema(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcionSubtema:$('#subtema_descripcionsubtema').val(),
        conclusion: $('#subtema_conclusion').val(),
        porcentajeCumplidoSubtema: $('#subtema_cumplimientoSubtema').val(),
        estadoSubtema: $('#subtema_estadoSubtema').val(),
        informe_id: $('#idns').val(),

    }
    $.ajax({
        url: 'subtema', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarSubtema();      
            limpiarsubtema();
        },
        complete: function(){
               
            }
    });  
}


/*MOSTRAR TODOS LO SUBTEMA*/
function mostrarSubtema(){
    $.get('SubtemaMostrar', function (data) {
        $("#tablasubtema").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaSubtema(item); // carga los datos en la tabla
        });      
    });
    
}

 
function eliminarSubtema(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'subtema/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
         mostrarSubtema(); // carga los datos en la tabla                       
        }
    });
}



/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarsubtema(){
    $('#subtema_descripcionsubtema').val("");
    $('#subtema_conclusion').val("");
    $('#subtema_cumplimientoSubtema').val("");
    $('#subtema_estadoSubtema').val("");
    

}



/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaSubtema(data){
  
    $("#tablasubtema").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcionSubtema+"</td>\
         <td>"+ data.conclusion+"</td>\
         <td>"+ data.estadoSubtema+"</td>\
         <td>"+ data.informe_v2.temaExamen+"</td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarSubtema("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-success' id='btn-confirm' onClick='Mostrar_Estado_Subtema("+data.id+")'><i class='fa fa-plus'></i>Agregar Estado</button></td></tr>"
    );
}


////////////////////////////////////////////////////////////////////7
function Mostrar_Estado_Subtema(id){
    $('#ventanaestadoSubtema').modal('show');
    $('#idSubtemam1').val(id);
    $('#txtconclusion').hide();
    $('#tablaEstadosSubtema').show();

    

}
///////////////////////////////////////777

////////////////////////////////////////
function CambiarEstadoSubtema(cadena) {
    $('#estadosubtema').val(cadena);
    $('#txtconclusion').show();
    $('#tablaEstadosSubtema').hide();
}
/////////////////////////////////////////////////////////////777
$('#brnGuardarEstadoM').click(function name() {
    //alert("hola");
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   var FrmData = {
       id:  $('#idSubtemam1').val(),
       estadoSubtema:$('#estadosubtema').val(),
       conclusion: $('#conclusionM').val(),
   }
       
   $.ajax({
       url:'Modificar_EstadoSubtema/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
       method: "POST",             // Tipo de solicitud que se enviará, llamado como método
       data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
       success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
       {
           //alert("Datos Modificados");
           mostrarSubtema();
           $('#ventanaestadoSubtema').modal('hide');
       },
       error: function(){
             alert("error"); 
           }
   });  
   
});


//////////////////////////////////////////////////////////////////////////////////////////
$("#B_Subtema").keyup(function() {
  
    $.get('buscarSubtema/'+$('#B_Subtema').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
               // limpia el tbody de la tabla
               //alert(2); 
               $('#tablasubtema').html('');
              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                $("#tablasubtema").append(
                       "<tr id='"+item.id+"'>"+
                        "<td>"+ item.descripcionSubtema+"</td>"+
                        "<td>"+ item.conclusion+"</td>"+
                        "<td>"+ item.porcentajeCumplidoSubtema+"</td>"+
                        "<td>"+ item.estadoSubtema+"</td>"+
                        "<td>"+ item.informe_v2.temaExamen+"</td>"+
                        "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarSubtemamodal' onClick='prepararactualizarSubtema("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                        "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarSubtema("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                 );
                 
          }); 
     });
 });
