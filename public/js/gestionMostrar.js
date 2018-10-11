 

window.onload = function() {
    window.onload=
    cargartablaGeneral($('#iduser').val())

}
function cargartablaGeneral(id){
<<<<<<< HEAD
    
=======
    //alert(id);
>>>>>>> 2ea8ed51b1fb1f31325a637bc0c939aa0bf62687
    $.get('MisDepartamentos/'+ id, function (data) { 
        //alert("hola");
         $('#tablageneral1').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablageneral1').append(
                '<tr>'+
<<<<<<< HEAD
                    '<td >'+item.name+'</td>'+
                    '<td >'+item.apellidos+'</td>'+
                   '<td >'+item.mis_departamentos.departament.descripcion+'</td>'+
=======
                  
                    '<td >'+item.name+'</td>'+
                    '<td >'+item.apellidos+'</td>'+
                    '<td >'+item.mis_departamentos.departament.descripcion+'</td>'+
>>>>>>> 2ea8ed51b1fb1f31325a637bc0c939aa0bf62687
                   '<td >'+item.mis_departamentos.departament.mi_recomendacion.recoment.descripcion+'</td>'+
                
                '</tr>'
            );
        });
    }); 
}