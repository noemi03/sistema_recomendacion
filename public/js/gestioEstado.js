window.onload=llenarEstado();

function ingresarEstado(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripcion:$('#descripcion').val(),
          
        }
        $.ajax({
            url:'Estado', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarEstado();

              $('#descripcion').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarEstado(){
      
        $.get('EstadoCargar', function (data) { 
             $('#tablaEstado').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaEstado').append(
                    '<tr>'+
                        '<td>'+item.descripcion+'</td>'+
                        '<td>'+
                          '<button type="button" class="btn btn-success btn-sm " onclick="editarEstado('+item.id+')"><i class="fa fa-edit"></i></button>  '+                         
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarEstado('+item.id+')"><i class="fa fa-trash"></i></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}



 function eliminarEstado(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'Estado/' + id,
            success: function (data) {
              
             llenarEstado();
                
               
            },  
        });
 }



function editarEstado(id){
 
        $.get('Estado/'+id+'/edit', function (data) {

              $('#descripcion').val(data.descripcion);
              $('#btnE').attr('class','btn btn-warning');
              $('#btnE').html("modificar");
              $('#btnE').attr('onclick','ActualizarEstado('+id+')');
        });
}


function ActualizarEstado(id){
        if ($('#descripcion').val()=='') {return;}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            descripcion: $('#descripcion').val(),
        }
        $.ajax({
            url:'Estado/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                 llenarEstado();
                 $('#btnE').attr('class','btn btn-primary ');
                 $('#btnE').attr('onclick','ingresarEstado()');
                 $('#btnE').html("Guardar");
                 $('#descripcion').val("")
                         
            }
        });
}
