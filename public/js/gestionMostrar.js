 

window.onload = function() {
    window.onload=
    cargartablaGeneral()
};


function cargartablaGeneral(){
    
    $.get('Mostrausuariogeneral', function (data) { 
         $('#tablageneral1').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablageneral1').append(
                '<tr>'+
                  
                    '<td >'+item.name+'</td>'+
                    '<td >'+item.apellidos+'</td>'+
                    '<td >'+item.cedula+'</td>'+
                    '<td >'+item.mi_departamento.departament.descripcion+'</td>'+
                    '<td >'+item.mi_departamento.departament.mi_recomendacion.recoment.descripcion+'</td>'+
                    
                '</tr>'
            );
     });
    }); 
}