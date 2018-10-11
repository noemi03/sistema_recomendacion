 

window.onload = function() {
    window.onload=
    cargartablaGeneral($('#iduser').val())

}
function cargartablaGeneral(id){
    //alert(id);
    $.get('MisDepartamentos/'+ id, function (data) { 
        //alert("hola");
         $('#tablageneral1').html(''); // limpia el tbody de la tabla
        //  console.log(data);
        //  return;
         
            //$.each(item.mis_departamentos.departament, function(e, item2) {
                var fila = '';
                fila += '<tr>';
                fila += '<td >'+data.name+'</td>';
                fila += '<td >'+data.apellidos+'</td>';
                fila += '<td >'+data.mis_departamentos.departament.descripcion+'</td>';
                fila += '<td >'+data.mis_departamentos.departament.mi_recomendacion.recoment.descripcion+'</td>';
                //fila += '<td >'+item2.departament.mi_reomendacion.recoment.descripcion+'</td>';
            //});

            fila +=  '</tr>';

            $('#tablageneral1').append(fila);

    }); 
}