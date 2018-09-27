window.onload=mostrarInforme();
/*FUNCION PARA INGRESAR LOS INFORME*/

function ingresarInforme(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
       fechaAprobacion:$('#informe_fecha').val(),
        memorandoSolicitud: $('#informe_memorando').val(),
        temaExamen: $('#informe_tema').val(),
        porcentajeCumplido: $('#informe_cumplido').val(),
        observacion: $('#informe_Observacion').val(), 
        codigoInforme: $('#informe_codigo').val(),
  
        
    
    }
    $.ajax({
        url: 'Informe', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarInforme();      
           limpiarInforme();
        },
        complete: function(){
               
            }
    });  
}

/*MOSTRAR TODOS LO INFORME*/
function mostrarInforme(){
    $.get('InformeMostrar', function (data) {
        $("#tablainforme").html("");
        $.each(data, function(i, item) { //recorre el data 
          cargartablaInforme(item); // carga los datos en la tabla
        });      
    });
    
}


function eliminarInforme(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Informe/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
         mostrarInforme(); // carga los datos en la tabla                       
        }
    });
}
/*MUESTRA LOS DATOS DEL INFORME SELECCIONADO  EN EL MODAL */
function prepararactualizarinforme(id){
   
    $.get('prepararInforme/'+id,function(data){
         
        $('#idInforme').val(data.id);
        $('#InformeFecha').val(data.fechaAprobacion);
        $('#InformeMemorando').val(data.memorandoSolicitud); 
        $('#InformeTema').val(data.temaExamen);
        $('#InformeCumplimiento').val(data.porcentajeCumplido);
        $('#InformeObservacion').val(data.observacion);   
        $('#InformeCodigo').val(data.codigoInforme);  
                        
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL INFORME*/
function informeUpdate(){ 
   var FrmData = {
        id: $('#idInforme').val(),
        fechaAprobacion:$('#InformeFecha').val(),
        memorandoSolicitud:$('#InformeMemorando').val(),
        temaExamen:$('#InformeTema').val(),
        porcentajeCumplido:$('#InformeCumplimiento').val(),
        observacion:$('#InformeObservacion').val(),
        codigoInforme:$('#InformeCodigo').val(),
     
    
    }
    console.log(FrmData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Informe/'+ $('#idInforme').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarInforme(); 
            limpiarinformeupdate();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarInforme(){
    $('#informe_fecha').val("");
    $('#informe_memorando').val("");
     $('#informe_tema').val("");
    $('#informe_cumplido').val("");
    $('#informe_Observacion').val("");
    $('#informe_codigo').val("");
    

}
function limpiarinformeupdate(){
    $('#InformeFecha').val("");
    $('#InformeMemorando').val("");
    $('#InformeTema').val("");
    $('#InformeCumplimiento').val("");
    $('#InformeObservacion').val("");
    $('#InformeCodigo').val("");
}



function  cargartablaInforme(data){
  //debugger
    $("#tablainforme").append(
        "<tr id='fila_cod"+"'>\
        <td>"+ data.fechaAprobacion+"</td>\
        <td>"+ data.memorandoSolicitud+"</td>\
        <td>"+ data.temaExamen+"</td>\
        <td>"+ data.porcentajeCumplido+"</td>\
        <td>"+ data.observacion+"</td>\
        <td>"+ data.codigoInforme+"</td>\
         <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}


$( "#B_Infome" ).keyup(function() {
  
 
    $.get('buscarInforme/'+$( "#B_Infome").val()+'/'+ $('#dtpFechaAprobación').val(), function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablainforme').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablainforme").append(
                      "<tr id='"+item.id+"'>"+
                       "<td>"+ item.fechaAprobacion+"</td>"+
                         "<td>"+ item.memorandoSolicitud+"</td>"+
                       "<td>"+ item.temaExamen+"</td>"+
                       "<td>"+ item.porcentajeCumplido+"</td>"+
                       "<td>"+ item.observacion+"</td>"+
                       "<td>"+ item.codigoInforme+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});

$( "#dtpFechaAprobación" ).change(function() {
    $.get('buscarInformev2/'+$('#dtpFechaAprobación').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
        // limpia el tbody de la tabla
        //alert(2); 
        $('#tablainforme').html('');
       $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
         $("#tablainforme").append(
                "<tr id='"+item.id+"'>"+
                 "<td>"+ item.fechaAprobacion+"</td>"+
                   "<td>"+ item.memorandoSolicitud+"</td>"+
                 "<td>"+ item.temaExamen+"</td>"+
                 "<td>"+ item.porcentajeCumplido+"</td>"+
                 "<td>"+ item.observacion+"</td>"+
                 "<td>"+ item.codigoInforme+"</td>"+
                 "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                 "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
          );
          
   }); 
});
});


$( "#btnRefrescarInforme" ).click(function() {
    mostrarInforme();
});



