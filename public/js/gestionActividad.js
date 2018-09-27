
window.onload=mostrarActividad();
/*FUNCION PARA INGRESAR LOS ACTIVIDAD*/

function ingresarActividad(){ 
    //Datos que se envian a la ruta   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//alert("hola");
    var FrmData = {
        descripcionA:$('#actividad_descripcion').val(),
        fecha: $('#actividad_fecha').val(),
        tarea_id: $('#actividad_tarea').val(),

    }
    //alert("hola *" +FrmData.descripcionA );
    //debugger
    $.ajax({
        url:'Actividad', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            
           
            mostrarActividad();  
                
            limpiarActividad();
        },
        complete: function(){
               
            }
    });  
}


/*MOSTRAR TODOS LO ACTIVIDA*/
function mostrarActividad(){
    $.get('ActividadMostrar', function (data) {
        $("#tablaactividad").html("");
        $.each(data, function(i, item) { //recorre el data 
           cargartablaActividad(item); // carga los datos en la tabla
        });      
    });
    
}

 
function eliminarActividad(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Actividad/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarActividad(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL TAREA SELECCIONADO  EN EL MODAL */
function prepararactualizarActividad(id){
   
    $.get('preparactualizarActividad/'+id,function(data){
        $('#idActividad').val(data.id);
        $('#descripcionAidfz').val(data.descripcionA);
        $('#fechaF').val(data.fecha); 
        $('#TareaA').val(data.tareas_v2.id);                   
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL TAREA*/
function ActividadUpdate(){ 

   var FrmData = {
        id: $('#idActividad').val(),
        descripcionA:$('#descripcionAidfz').val(),
        fecha:$('#fechaF').val(),
        tarea_id:$('#TareaA').val(),
    
    }
    console.log(FrmData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Actividad/'+ $('#idActividad').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarActividad(); 
            limpiarActividad();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function  limpiarActividad(){
    $('#actividad_descripcion').val('');
    $('#actividad_fecha').val('');
}


/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaActividad(data){
  //debugger
    $("#tablaactividad").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcionA+"</td>\
         <td>"+ data.fecha+"</td>\
         <td>"+ data.tareas_v2.descripcion+"</td>\
         <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarActividadmodal' onClick='prepararactualizarActividad("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'> <button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarActividad("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}





$( "#buscar_Actividad" ).keyup(function() {
  
 
    $.get('buscarActividad/'+$( "#buscar_Actividad").val()+'/'+ $('#dtpFecha').val(), function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaactividad').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaactividad").append(
                      "<tr id='"+item.id+"'>"+
                       "<td>"+ item.descripcionA+"</td>"+
                         "<td>"+ item.fecha+"</td>"+
                       "<td>"+ item.tareas_v2.descripcion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarActividadmodal' onClick='prepararactualizarActividad("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarActividad("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});

$( "#dtpFecha" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarActividad2/'+$('#dtpFecha').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaactividad').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaactividad").append(
                      "<tr id='"+item.id+"'>"+
                       "<td>"+ item.descripcionA+"</td>"+
                         "<td>"+ item.fecha+"</td>"+
                       "<td>"+ item.tareas_v2.descripcion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarActividadmodal' onClick='prepararactualizarActividad("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarActividad("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});

//btnRefrescar

$( "#btnRefrescar" ).click(function() {
  mostrarActividad();
});