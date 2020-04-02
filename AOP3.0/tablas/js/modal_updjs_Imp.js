$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		var idcaso=$('#idImp'+id).text();
		var producto=$('#producto'+id).text();
		var prioridad=$('#prioridad'+id).text();
		var medio=$('#medio'+id).text();
		var fechaReporte=$('#fechaReporte'+id).text();
		var tipoServicio=$('#tipoServicio'+id).text();
		var descripcion=$('#descripcion'+id).text();
		var clase=$('#clase'+id).text();
		var categoria=$('#categoria'+id).text();
		var tipo=$('#tipo'+id).text();
		var grupo=$('#grupo'+id).text();
		var cliente=$('#cliente'+id).text();
		var causaRaiz=$('#causaRaiz'+id).text();
		var categoriaResolucion=$('#categoriaResolucion'+id).text();
		var registroTrabajo=$('#registroTrabajo'+id).text();
		var estatus=$('#estatus'+id).text();
		var fechaSolucion=$('#fechaSolucion'+id).text();
		var reabierto=$('#reabierto'+id).text();
		var fechaReabierto=$('#fechaReabierto'+id).text();
		var horasANS=$('#horasHabil'+id).text();
		var horasLstUpd=$('#fecha_upd'+id).text();

	
	if(estatus == 'Resuelto' || estatus == 'Cerrado'){
		$('#reabre').modal('show');
		$('#eIdcaso').val(idcaso);
		$('#eProducto').val(producto);
		$('#ePrioridad').val(prioridad);
		$('#eMedio').val(medio);
		$('#eFechaReporte').val(fechaReporte);
		$('#eTipoServicio').val(tipoServicio);
		$('#eDescripcion').val(descripcion);
		$('#eClase').val(clase);
		$('#eCategoria').val(categoria);
		$('#eTipo').val(tipo);
		$('#eGrupo').val(grupo);
		$('#eCliente').val(cliente);
		$('#eCausaRaiz').val(causaRaiz);
		$('#eCategoriaResolucion').val(categoriaResolucion);
		$('#eRegistroTrabajo').val(registroTrabajo);
		$('#eEstatus').val(estatus);
		$('#eFechaSolucion').val(fechaSolucion);
		$('#eFechaReabierto').val(fechaReabierto);
		$('#eHorasANS').val(horasANS);
	}	
	else{
		$('#editar').modal('show');
		$('#eIdcaso2').val(idcaso);
		$('#eProducto2').val(producto);
		$('#ePrioridad2').val(prioridad);
		$('#eMedio2').val(medio);
		$('#eFechaReporte2').val(fechaReporte);
		$('#eTipoServicio2').val(tipoServicio);
		$('#eDescripcion2').val(descripcion);
		$('#eClase2').val(clase);
		$('#eCategoria2').val(categoria);
		$('#eTipo2').val(tipo);
		$('#eGrupo2').val(grupo);
		$('#eCliente2').val(cliente);
		$('#eCausaRaiz2').val(causaRaiz);
		$('#eCategoriaResolucion2').val(categoriaResolucion);
		$('#eRegistroTrabajo2').val(registroTrabajo);
		$('#eEstatus2').val(estatus);
		$('#eReabierto2').val(reabierto);
		$('#eFechaReabierto2').val(fechaReabierto);
		$('#eFechaLastUpd').val(horasLstUpd);
	}	
	});
});