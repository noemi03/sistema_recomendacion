
window.onload=mostrarInforme();
//window.onload=mostrarSubtema();
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
        fechaLimite:$('#informe_fechaLimite').val(),
        memorandoSolicitud: $('#informe_memorando').val(),
        temaExamen: $('#informe_tema').val(),
        porcentajeCumplido: $('#informe_cumplido').val(),
        observacion: $('#informe_Observacion').val(), 
        codigoInforme: $('#informe_codigo').val(),
        estadoInforme: $('#informe_estadoInforme').val(),
        tipoInforme_id:$('#informe_tipo').val(),
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
        $('#InformeFechalimite').val(data.fechaLimite);
        $('#InformeMemorando').val(data.memorandoSolicitud); 
        $('#InformeTema').val(data.temaExamen);
        $('#InformeCumplimiento').val(data.porcentajeCumplido);
        $('#InformeObservacion').val(data.observacion);   
        $('#InformeCodigo').val(data.codigoInforme);
        $('#InformeEstadoInforme').val(data.estadoInforme);  
        $('#informe_tipoinforme').val(data.tipoInforme_id);     
                        
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL INFORME*/
function informeUpdate(){ 
   var FrmData = {
        id: $('#idInforme').val(),
        fechaAprobacion:$('#InformeFecha').val(),
        fechaLimite: $('#InformeFechalimite').val(),
        memorandoSolicitud:$('#InformeMemorando').val(),
        temaExamen:$('#InformeTema').val(),
        porcentajeCumplido:$('#InformeCumplimiento').val(),
        observacion:$('#InformeObservacion').val(),
        codigoInforme:$('#InformeCodigo').val(),
        estadoInforme:$('#InformeEstadoInforme').val(),
        tipoInforme_id:$('#informe_tipoinforme').val(),

     
    
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
    $('#informe_fechaLimite').val("");
    $('#informe_memorando').val("");
     $('#informe_tema').val("");
    $('#informe_cumplido').val("");
    $('#informe_Observacion').val("");
    $('#informe_codigo').val("");
    $('#informe_estadoInforme').val("");
    

}
function limpiarinformeupdate(){
    $('#InformeFecha').val("");
    $('#InformeFechalimite').val("");
    $('#InformeMemorando').val("");
    $('#InformeTema').val("");
    $('#InformeCumplimiento').val("");
    $('#InformeObservacion').val("");
    $('#InformeCodigo').val("");
    $('#InformeEstadoInforme').val("");
}



function  cargartablaInforme(data){
  //debugger
    $("#tablainforme").append(
        "<tr id='fila_cod"+"'>\
        <td>"+ data.fechaAprobacion+"</td>\
        <td>"+ data.fechaLimite+"</td>\
        <td>"+ data.codigoInforme+"</td>\
        <td>"+ data.estadoInforme+"</td>\
        <td>"+ data.observacion+"</td>\
        <td>"+ data.tipoinforme_v2.tipoInforme+"</td>\
        <td class='row'><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+data.id+")'><i class='fa fa-edit'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+data.id+")'><i class='fa fa-trash'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-primary' id='btn-confirm' onClick='Mostrar_informe_Subtema("+data.id+")'><i class='fa fa-file-archive-o'></i>Agregar Subtema</button></td>\
        <td class='row'><button type='button' class='btn btn-success' id='btn-confirm' onClick='Mostrar_Estado("+data.id+")'><i class='fa fa-plus'></i>Agregar Estado</button></td>\
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
                       "<td>"+ item.fechaLimite+"</td>"+
                         "<td>"+ item.memorandoSolicitud+"</td>"+
                       "<td>"+ item.temaExamen+"</td>"+
                       "<td>"+ item.porcentajeCumplido+"</td>"+
                       "<td>"+ item.observacion+"</td>"+
                       "<td>"+ item.codigoInforme+"</td>"+
                       "<td>"+ item.estadoInforme+"</td>"+
                       "<td>"+ item.tipoinforme_v2.tipoInforme+"</td>"+
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
                 "<td>"+ item.fechaLimite+"</td>"+
                 "<td>"+ item.memorandoSolicitud+"</td>"+
                 "<td>"+ item.temaExamen+"</td>"+
                 "<td>"+ item.porcentajeCumplido+"</td>"+
                 "<td>"+ item.observacion+"</td>"+
                 "<td>"+ item.codigoInforme+"</td>"+
                 "<td>"+ item.estadoInforme+"</td>"+
                 "<td>"+ item.tipoinforme_v2.tipoInforme+"</td>"+
                 "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                 "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
          );
          
   }); 
});
});


$( "#btnRefrescarInforme" ).click(function() {
    mostrarInforme();
});

/////////////////////////////////////////////////////////////////////////////////////////
function Mostrar_informe_Subtema(id){
    $('#ventanaModal_Informesubtema').modal('show');
    $('#idns').val(id);
     mostrarSubtema();
     
}
/////////////////////////////////////////////////////////////////////////7
function Mostrar_Estado(id){
    $('#ventanaestado').modal('show');
    $('#idInformeM').val(id);
    $('#txtObservacion').hide();
    $('#tablaEstados').show();
    $('#brnGuardarM').hide();

}
function CambiarEstado(cadena) {
    $('#estadito').val(cadena);
    $('#txtObservacion').show();
    $('#tablaEstados').hide();
}

$('#observacionM').keypress(function () {
   if ($('#observacionM').val()!=null) {
    $('#brnGuardarM').show(); 
   }
});
/////////////////////////////////////////////////
$('#brnGuardarM').click(function name() {
     //alert("hola");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        id:             $('#idInformeM').val(),
        estadoInforme:  $('#estadito').val(),
        observacion:    $('#observacionM').val(),
    }
        
    $.ajax({
        url:'ModificarEstado/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            //alert("Datos Modificados");
            mostrarInforme();
            $('#ventanaestado').modal('hide');
        },
        error: function(){
              alert("error"); 
            }
    });  
    
});