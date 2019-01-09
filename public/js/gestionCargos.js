window.onload=llenarCargos();

function IngresarCargos(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripcionCargo:$('#idcargo').val(), //CAMPO DE LA BASE DE DATOS
          
        }
        $.ajax({
            url:'Cargo', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarCargos();
              $('#idcargo').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarCargos(){
      
        $.get('CargosCargar', function (data) { 
             $('#tablaCargo').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaCargo').append(
                    '<tr>'+
                        '<td>'+item.descripcionCargo+'</td>'+
                        '<td>'+
                          '<button type="button" class="btn btn-success btn-sm " onclick="editarCargos('+item.id+')"><i class="fa fa-edit"></i></button>  '+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCargos('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                        
                        '</tr>'
                );
         });
    });
}



 function eliminarCargos(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'Cargo/' + id,
            success: function (data) {
              
             llenarCargos();
                
               
            },  
        });
 }


function editarCargos(id){
        $.get('Cargo/'+id+'/edit', function (data) {

              $('#idcargo').val(data.descripcionCargo);
              $('#btnTI').attr('class','btn btn-warning');
              $('#btnTI').html("modificar");
              $('#btnTI').attr('onclick','ActualizarCargo('+id+')');
        });
}



function ActualizarCargo(id){
        if ($('#idcargo').val()=='') {return;}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            descripcionCargo: $('#idcargo').val(),
        }
        
        $.ajax({
            url:'Cargo/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                 llenarCargos();
                 $('#btnTI').attr('class','btn btn-primary ');
                 $('#btnTI').attr('onclick','IngresarCargos()');
                 $('#btnTI').html("Guardar");
            }
        });
      

    }

    
