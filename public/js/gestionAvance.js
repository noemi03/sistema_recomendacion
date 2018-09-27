$(document).ready(function()
       {
          AvanceMostrar();
 });
/*FUNCION PARA INGRESAR LOS Avance*/

function AvanceInsert(){ 
    //Datos que se envian a la rut
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcionAV:$('#descripcionAvance').val(),
        actividad_Id: $('#ActividadId').val(),
        estado_id: $('#Estadoid').val(),
    }
    $.ajax({
        url: 'Avance', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
       
            AvanceMostrar();      
            limpiarA();
        },
        complete: function(){
               
        } 
    });  
}


/*MOSTRAR TODOS LO AVANCE*/
function AvanceMostrar(){
    $.get('AvanceMostrar', function (data) {
        $("#tablaavances").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaAvance(item); // carga los datos en la tabla
        });      
    });
    
}

function AvanceDelete(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'Avance/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          AvanceMostrar(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL AVANCE SELECCIONADO  EN EL MODAL */
function prepararactualizarAvance(id){
    $.get('preparactualizar1/'+id,function(data){
        $('#idavance').val(data.id);
        $('#descripcionavance').val(data.descripcionAV);
        $('#actividad_Idavance1').val(data.actividad_v2.id);
        $('#estado_idavance').val(data.estado_v2.id);
                   
    });
}
 
/*PARA ACTUALIZAR LOS DATOS DEL AVANCE*/
function AvanceUpdate(){ 
   var FrmData = {
        id: $('#idavance').val(),
        descripcionAV:$('#descripcionavance').val(),
        actividad_Id:$('#actividad_Idavance1').val(),
        estado_id: $('#estado_idavance').val(),
    }
    console.log(FrmData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'Avance/'+ $('#idavance').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            AvanceMostrar(); 
            limpiarA();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarA(){
    $("#descripcionAvance").val("");
}



/*FUNCIÓN PARA CARGAR LOS AVANCES EN LA TABLA*/
function cargartablaAvance(data){
  
    $("#tablaavances").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcionAV+"</td>\
         <td>"+ data.actividad_v2.descripcionA+"</td>\
         <td>"+ data.estado_v2.descripcion+"</td>\
         <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarAvancemodal'onClick='prepararactualizarAvance("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='AvanceDelete("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
  
    );
}

/*FUNCIÓN PARA BUSCAR LOS AVANCES EN LA TABLA*/
$("#descripcionAvances").keyup(function() {
    
    //alert("hola");
    $.get('buscarAvance/'+$('#descripcionAvances').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
               // limpia el tbody de la tabla
               //alert(2); 
               $('#tablaavances').html('');
              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                $("#tablaavances").append(
                       "<tr id='"+item.id+"'>"+
                        "<td>"+ item.descripcionAV+"</td>"+
                        "<td>"+ item.actividad_v2.descripcionA+"</td>"+
                        "<td>"+ item.estado_v2.descripcion+"</td>"+
                        "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarAvancemodal' onClick='prepararactualizarAvance("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                        "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='AvanceDelete("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                 );
                 
          }); 
     });
 });
 