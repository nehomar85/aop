function update_cierre(){
	//var msg = "REALIZA EL UPDATE";
	var idcaso = $("#eIdcaso2").val();
	var producto = $("#eProducto2").val();
    var prioridad = $("#ePrioridad2").val();
	var medio=$("#eMedio2").val();
	var tipoServicio=$("#eTipoServicio2").val();
	var descripcion=$("#eDescripcion2").val();
	var clase=$("#eClase2").val();
	var categoria=$("#eCategoria2").val();
	var grupo=$("#eGrupo2").val();
	var cliente=$("#eCliente2").val();
	var causaRaiz=$("#eCausaRaiz2").val();
	var categoriaResolucion=$("#eCategoriaResolucion2").val();
	var registroTrabajo=$("#eRegistroTrabajo2").val();
	var estatus=$("#eEstatus2").val();
	var fechaEstado=$("#eFechaEstado2").val();
	var fechaSolucion=$("#eFechaSolucion2").val();
	var usuario_log=$("#usuario_log").val();
	
	$.ajax({
		type: "POST",
		url: 'tablas/upd_cerrar_caso',
		data: {idcaso,producto,prioridad,medio,tipoServicio,descripcion,clase,categoria,grupo,cliente,causaRaiz,categoriaResolucion,registroTrabajo,estatus,fechaEstado,fechaSolucion,usuario_log},
		success: function(data){
			$("#editar").modal("hide");
		}
    });
}