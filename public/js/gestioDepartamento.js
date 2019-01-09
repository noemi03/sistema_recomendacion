window.onload=llenarDepartamento();

function ingresarDepartamento(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripcionDepartamento:$('#descripcionDepartamento').val(),
          
        }
        $.ajax({
            url:'Departamento', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarDepartamento();
              $('#descripcionDepartamento').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarDepartamento(){
      
        $.get('DepartamentoCargar', function (data) { 
             $('#tablaDepartamento').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaDepartamento').append(
                    '<tr>'+
                        '<td>'+item.descripcionDepartamento+'</td>'+
                        '<td>'+
                        '<button type="button" class="btn btn-success btn-sm " onclick="editartipoDepartamento('+item.id+')"><i class="fa fa-edit"></i></button>'+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarDepartamento('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-warning btn-sm" onclick="mostrar_cargos_departamento('+item.id+')"><i class="fa fa-building-o"></i></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}



 function eliminarDepartamento(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'Departamento/' + id,
            success: function (data) {
              
             llenarDepartamento();
                
               
            },  
        });
 }


function editartipoDepartamento(id){
        $.get('Departamento/'+id+'/edit', function (data) {

              $('#descripcionDepartamento').val(data.descripcionDepartamento);
              $('#btnD').attr('class','btn btn-warning');
              $('#btnD').html("modificar");
              $('#btnD').attr('onclick','ActualizarDepartamento('+id+')');
             
        });

 
}



function ActualizarDepartamento(id){
        if ($('#descripcionDepartamento').val()=='') {return;}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            descripcionDepartamento: $('#descripcionDepartamento').val(),
        }
        $.ajax({
            url:'Departamento/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                llenarDepartamento();
                 $('#btnD').attr('class','btn btn-primary ');
                 $('#btnD').attr('onclick','ingresarDepartamento()');
                 $('#btnD').html("Guardar");
            }
        });
}

    
function mostrar_cargos_departamento(id){
    $('#mostralmodal').modal('show');
     $('#idCD').val(id);
    llenarCargoDepartamento(); 
    mostrarCargoDepartamento(id);
     
}

function llenarCargoDepartamento(){
    
    $.get('CargosCargar', function (data) { 
         $('#tablaasignarcargosaldepartamento').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablaasignarcargosaldepartamento').append(
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
  

  function ingresarCargosDepartamento(){ 
    
    //recorremos la tabla para capturar los datos
     $('#tablaasignarcargosaldepartamento tr').each(function () {
         control = $(this).find("td").eq(2).html();
         idcargo = $(this).find("td").eq(0).html();
         iddepartamento=$('#idCD').val();
        if (control =='0') {
           
           $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           var FrmData = {
            cargos_id:idcargo,
            departamento_id:iddepartamento,
           }
           $.ajax({
               url: 'CargoDepartamento', // Url que se envia para la solicitud esta en el web php es la ruta
               method: "POST",             // Tipo de solicitud que se enviará, llamado como método
               data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
               success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
               {
            
                       mostrarCargoDepartamento( $('#idCD').val());
                   //eliminarRecomendacionDepartamento();
               },
               complete: function(){
                      
                }
           });
        }

    });
     llenarCargoDepartamento(); 
}



/*MOSTRAR TODOS LOS DEPARTAMENTO A LOS USUARIOS*/
function mostrarCargoDepartamento(id){

    $.get('CargosDepartamentosMostrar/'+id, function (data) { 
        $("#tabla_DepartamentoCargo").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaCargoDepartamento(item); // carga los datos en la tabla
        });      
    });
    
}



function eliminarCargoDepartamento(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'CargoDepartamento/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarCargoDepartamento( $('#idCD').val()); // carga los datos en la tabla                       
        }
    });
}



/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/
function cargartablaCargoDepartamento(data){
  //debugger
    $("#tabla_DepartamentoCargo").append(
        "<tr id='fila_cod"+"'>\
        <td>"+ data.cargos_v2.descripcionCargo+"</td>\
         <td>"+ data.departamento_v2.descripcionDepartamento+"</td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarCargoDepartamento("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}