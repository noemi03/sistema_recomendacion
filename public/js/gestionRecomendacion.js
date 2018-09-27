function editarrecomendaciones(id){

$('#actualizarRecomendacionmodal').modal('show');
	$.get('recomendaciones/'+id+'/edit',function(data){
		// uso de tus datos
		$("#frm_recom_editar").prop("action","recomendaciones/"+data.id);
		$("#recom_edit_descripcion").val(data.descripcion);
		$("#recom_edit_cumplimiento").val(data.porcentajeCumplimiento);
		$("#rec_edit_subtema").val(data.sub_temas.id);
		$("#rec_edit_estado").val(data.estado.id);
		$("#rec_edit_tipoRecomendacion").val(data.tipo_recomendacion.id);
	});
}


function eliminarRecomendacion(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'recomendaciones/' + id,
            success: function (data) {
             
                
               
            },  
        });
 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*FUNCION PARA INGRESAR LOS RECOMENDACION DEPARTAMENTO*/

 
function mostrar_recomendacion_departamento(id){
    $('#ventanaModalRecomendacionDepartamento').modal('show');
     $('#idr').val(id);
    llenarDepartamentoaunarecomendacion(); 
    mostrarRecomendacionDepartamento(id);
      
} 

function llenarDepartamentoaunarecomendacion(){
    
    $.get('DepartamentoCargar', function (data) { 
         $('#tablaasignardepartamento').html(''); // limpia el tbody de la tabla
         $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            // agregaso uno a uno los valores del objero json como una fila
            // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
            $('#tablaasignardepartamento').append(
                '<tr>'+
                    '<td hidden >'+item.id+'</td>'+
                    '<td >'+item.descripcion+'</td>'+
                    '<td hidden id="n'+item.id+'" ></td>'+
                    '<td>'+
                    '<input type="checkbox" class="form-check-input" id="exampleCheck1'+item.id+'" onclick="(agregarControl('+item.id+'))"/>'+
                    '<label class="form-check-label" for="exampleCheck1"  ><i class="fa fa-plus-square-o"></i></label>'+
                    '</td>'+
                '</tr>'
            );
     });
    }); 
}

function agregarControl(id){
  if( $('#exampleCheck1'+id).is(':checked') ) {
      $('#n'+id).html(0);
  }  
}




 










