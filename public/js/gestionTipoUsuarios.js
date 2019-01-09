window.onload=llenarTipoUsuarios();

function ingresarTipoUsuarios(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripciontipo:$('#descripcion').val(),
          
        }
        $.ajax({
            url:'TipoUsuario', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarTipoUsuarios();
              $('#descripcion').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarTipoUsuarios(){
      
        $.get('TipoUsuarioCargar', function (data) { 
             $('#tablaTipoUsuario').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaTipoUsuario').append(
                    '<tr>'+
                        '<td>'+item.descripciontipo+'</td>'+
                        '<td>'+
                          '<button type="button" class="btn btn-info btn-sm " onclick="editarTipoUsuarios('+item.id+')"><i class="fa fa-edit"></i></button>  '+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarTipoUsuarios('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}



 function eliminarTipoUsuarios(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'TipoUsuario/' + id,
            success: function (data) {
              
             llenarTipoUsuario();
                
               
            },  
        });
 }


function editarTipoUsuarios(id){
        $.get('TipoUsuario/'+id+'/edit', function (data) {

              $('#descripcion').val(data.descripciontipo);
              $('#btnTU').attr('class','btn btn-warning');
              $('#btnTU').html("modificar");
              $('#btnTU').attr('onclick','ActualizarTipoUsuarios('+id+')');
        });
}



function ActualizarTipoUsuarios(id){
        if ($('#descripcion').val()=='') {return;}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            descripciontipo: $('#descripcion').val(),
        }
        $.ajax({
            url:'TipoUsuario/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                llenarTipoUsuarios();
                 $('#btnTU').attr('class','btn btn-primary ');
                 $('#btnTU').attr('onclick','ingresarTipoUsuarios()');
                 $('#btnTU').html("Guardar");
            }
        });
}
