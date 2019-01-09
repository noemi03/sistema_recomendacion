window.onload=llenarTInforme();

function ingresarTInforme(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            tipoInforme:$('#descripcion').val(),
          
        }
        $.ajax({
            url:'TipoInforme', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarTInforme();
              $('#descripcion').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarTInforme(){
      
        $.get('TipoInformeCargar', function (data) { 
             $('#tablaTInforme').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaTInforme').append(
                    '<tr>'+
                        '<td>'+item.tipoInforme+'</td>'+
                        '<td>'+
                          '<button type="button" class="btn btn-success btn-sm " onclick="editarTInforme('+item.id+')"><i class="fa fa-edit"></i></button>  '+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarTInforme('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}



 function eliminarTInforme(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'TipoInforme/' + id,
            success: function (data) {
              
             llenarTInforme();
                
               
            },  
        });
 }


function editarTInforme(id){
        $.get('TipoInforme/'+id+'/edit', function (data) {

              $('#descripcion').val(data.tipoInforme);
              $('#btnTI').attr('class','btn btn-warning');
              $('#btnTI').html("modificar");
              $('#btnTI').attr('onclick','ActualizarTInforme('+id+')');
        });
}



function ActualizarTInforme(id){
        if ($('#descripcion').val()=='') {return;}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            tipoInforme: $('#descripcion').val(),
        }
        $.ajax({
            url:'TipoInforme/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                 llenarTInforme();
                 $('#btnTI').attr('class','btn btn-primary ');
                 $('#btnTI').attr('onclick','ingresarTInforme()');
                 $('#btnTI').html("Guardar");
            }
        });
}
