
window.onload=mostrarTareas();
/*FUNCION PARA INGRESAR LOS TAREA*/

function ingresarTareas(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcion:$('#tarea_descripcion').val(),
        recomendacionesDepartamentoid: $('#tarea_recomendacionD').val(),
        
    
    }
    $.ajax({
        url: 'Tarea', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarTareas();      
            limpiar();
        },
        complete: function(){
               
            }
    });  
}


/*MOSTRAR TODOS LO TAREAS*/
function mostrarTareas(){
    $.get('TareasMostrar', function (data) {
        $("#tablatareas").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaTarea(item); // carga los datos en la tabla
        });      
    });
    
}

 
function eliminarTareas(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Tarea/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarTareas(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL TAREA SELECCIONADO  EN EL MODAL */
function prepararactualizarTarea(id){

   
    $.get('preparactualizartareas/'+id,function(data){

      
        $('#idTarea').val(data.id);
        $('#tareadescripcion').val(data.descripcion);
        $('#tarearecope').val(data.r_departamento.id);                   
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL TAREA*/
function TareasUpdate(){ 
   var FrmData = {
        id: $('#idTarea').val(),
        descripcion:$('#tareadescripcion').val(),
        recomendacionesDepartamentoid:$('#tarearecope').val(),
    
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Tarea/'+ $('#idTarea').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarTareas(); 
            limpiar();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiar(){
    $('#tarea_descripcion').val('');
}


/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/

function cargartablaTarea(data){
  
    $("#tablatareas").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcion+"</td>\
         <td>"+ data.r_departamento.estado+"</td>\
         <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarTareasmodal'onClick='prepararactualizarTarea("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarTareas("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}



/*FUNCIÓN PARA BUSCAR LOS TAREA EN LA TABLA*/
$("#B_Tareas").keyup(function() {
    
    //alert("hola");
    $.get('buscarTarea/'+$('#B_Tareas').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
               // limpia el tbody de la tabla
               //alert(2); 
               $('#tablatareas').html('');
              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                $("#tablatareas").append(
                       "<tr id='"+item.id+"'>"+
                        "<td>"+ item.descripcion+"</td>"+
                        "<td>"+ item.r_departamento.estado+"</td>"+
                        "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarTareasmodal' onClick='prepararactualizarTarea("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                        "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarTareas("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                 );
                 
          }); 
     });
 });
 