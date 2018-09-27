



/*FUNCION PARA INGRESAR LOS RECOMENDACION DEPARTAMENTO*/


function ingresarRecomendacionDepartamento(){ 
    
    //recorremos la tabla para capturar los datos
     $('#tablaasignardepartamento tr').each(function () {
         control = $(this).find("td").eq(2).html();
         iddepartamento = $(this).find("td").eq(0).html();
         estado_t= $('#estado').val();
         idrecomendacion_t=$('#idr').val();
        if (control =='0') {
           
           $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           var FrmData = {
               estado:estado_t,
               departamento_id:iddepartamento ,
               recomendacion_id:idrecomendacion_t,
           }
           $.ajax({
               url: 'RecomendacionesDepartamento', // Url que se envia para la solicitud esta en el web php es la ruta
               method: "POST",             // Tipo de solicitud que se enviará, llamado como método
               data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
               success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
               {
                 mostrarRecomendacionDepartamento($('#idr').val());
                      
                   //eliminarRecomendacionDepartamento();
               },
               complete: function(){
                      
                }
           });
        }

    });
      llenarDepartamentoaunarecomendacion();
}


/*MOSTRAR TODOS LO RECOMENDACION DEPARTAMENTO*/
function mostrarRecomendacionDepartamento(id){

    $.get('RecomendacioDMostrar/'+id, function (data) { 
        $("#tabla_Recomendacio_Departamento").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaRecomendaionDepartamento(item); // carga los datos en la tabla
        });      
    });
    
}


function eliminarRecomendacionDepartamento(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'RecomendacionesDepartamento/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarRecomendacionDepartamento($('#idr').val()); // carga los datos en la tabla                       
        }
    });
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarRecomendacionDepartamento(){
    $('#recomendacion_d_estado').val("");
}


/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaRecomendaionDepartamento(data){
  //debugger
    $("#tabla_Recomendacio_Departamento").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.estado+"</td>\
         <td>"+ data.departamento_v2.descripcion+"</td>\
         <td>"+ data.recomendacion_v2.descripcion+"</td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarRecomendacionDepartamento("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}

