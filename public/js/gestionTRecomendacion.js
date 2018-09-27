window.onload=llenarTRecomendacion();

function ingresarTRecomendacion(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripcion:$('#descripcion').val(),
          
        }
        $.ajax({
            url:'TipoRecomendacion', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarTRecomendacion();
              $('#descripcion').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarTRecomendacion(){
      
        $.get('TipoRecomendacionCargar', function (data) { 
             $('#tablaTRecomendacion').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaTRecomendacion').append(
                    '<tr>'+
                        '<td>'+item.descripcion+'</td>'+
                        '<td>'+
                          '<button type="button" class="btn btn-success btn-sm " onclick="editarTRecomendacion('+item.id+')"><i class="fa fa-edit"></i></button>  '+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarTRecomendacion('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}



 function eliminarTRecomendacion(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'TipoRecomendacion/' + id,
            success: function (data) {
              
             llenarTRecomendacion();
                
               
            },  
        });
 }


function editarTRecomendacion(id){
        $.get('TipoRecomendacion/'+id+'/edit', function (data) {

              $('#descripcion').val(data.descripcion);
              $('#btnTR').attr('class','btn btn-warning');
              $('#btnTR').html("modificar");
              $('#btnTR').attr('onclick','ActualizarTRecomendacion('+id+')');
        });
}



function ActualizarTRecomendacion(id){
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
            url:'TipoRecomendacion/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                 llenarTRecomendacion();
                 $('#btnTR').attr('class','btn btn-primary ');
                 $('#btnTR').attr('onclick','ingresarTRecomendacion()');
                 $('#btnTR').html("Guardar");
            }
        });
}
