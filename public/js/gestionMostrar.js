 

window.onload = function() {
    window.onload=
    cargartablaGeneral()
};


function cargartablaGeneral(){
    
    $.get('MostraDRgeneral', function (data) { 
         $('#tablageneral1').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablageneral1').append(
                '<tr>'+
                  
                    '<td >'+item.estado+'</td>'+
                    '<td >'+item.departamento_v2.descripcion+'</td>'+
                    '<td >'+item.recomendacion_v2.descripcion+'</td>'+
                
                '</tr>'
            );
     });
    }); 
}