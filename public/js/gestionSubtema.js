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
        descripcion:$('#subtema_descripcion').val(),
        conclusion: $('#subtema_conclusion').val(),
        porcentajeCumplido: $('#subtema_cumplimiento').val(),
        informe_id: $('#subtema_informe').val(),
        
    
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

/*MUESTRA LOS DATOS DEL SUBTEMA SELECCIONADO  EN EL MODAL */
function prepararactualizarSubtema(id){
   
    $.get('preparactualizarSubtema/'+id,function(data){
        $('#idSubtema').val(data.id);
        $('#SubtemaDescripcion').val(data.descripcion);
        $('#subtemaconclusion').val(data.conclusion); 
         $('#subtemacumplimiento').val(data.porcentajeCumplido);
        $('#subtemainforme').val(data.informe_v2.id); 
        $('#subtemacodigoI').val(data.informe_v2.id);                     
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL SUBTEMA*/
function subtemaUpdate(){ 
   var FrmData = {
        id: $('#idSubtema').val(),
        descripcion:$('#SubtemaDescripcion').val(),
        conclusion:$('#subtemaconclusion').val(),
        porcentajeCumplido:$('#subtemacumplimiento').val(),
        informe_id:$('#subtemainforme').val(),
        informe_id:$('#subtemacodigoI').val(),
        
    
    }
    console.log(FrmData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'subtema/'+ $('#idSubtema').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarSubtema(); 
         limpiarsubtemaupdate();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarsubtema(){
    $('#subtema_descripcion').val("");
    $('#subtema_conclusion').val("");
    $('#subtema_cumplimiento').val("");
    

}
function limpiarsubtemaupdate(){
    $('#SubtemaDescripcion').val("");
    $('#subtemaconclusion').val("");
    $('#subtemacumplimiento').val("");
   
}


/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaSubtema(data){
  
    $("#tablasubtema").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcion+"</td>\
          <td>"+ data.conclusion+"</td>\
           <td>"+ data.porcentajeCumplido+"</td>\
         <td>"+ data.informe_v2.temaExamen+"</td>\
         <td>"+ data.informe_v2.codigoInforme+"</td>\
         <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarSubtemamodal' onClick='prepararactualizarSubtema("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarSubtema("+data.id+")'><i class='fa fa-trash'></i></button></td></tr>"
    );
}

$("#B_Subtema").keyup(function() {
  
    $.get('buscarSubtema/'+$('#B_Subtema').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
               // limpia el tbody de la tabla
               //alert(2); 
               $('#tablasubtema').html('');
              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                $("#tablasubtema").append(
                       "<tr id='"+item.id+"'>"+
                        "<td>"+ item.descripcion+"</td>"+
                        "<td>"+ item.conclusion+"</td>"+
                        "<td>"+ item.porcentajeCumplido+"</td>"+
                        "<td>"+ item.informe_v2.temaExamen+"</td>"+
                        "<td>"+ item.informe_v2.codigoInforme+"</td>"+
                        "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarSubtemamodal' onClick='prepararactualizarSubtema("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                        "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarSubtema("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                 );
                 
          }); 
     });
 });
