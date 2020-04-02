function valida(f) {
	var ok = true;
	var FechaReporte = $("#eFechaReporte2").val();
	var FechaSolucion = $("#eFechaSolucion2").val();
	var FechaEstado = $("#eFechaEstado2").val();
	var FechaLastUpd = $("#eFechaLastUpd").val();
	var redir = 1;
	
	var msg = "Validaciones al Actualizar Caso:\n";
	if(f.elements["eEstatus2"].value == "Resuelto" || f.elements["eEstatus2"].value == "Cerrado"){
	  if(FechaSolucion !== ""){
		if(Date.parse(FechaSolucion)<Date.parse(FechaLastUpd)){
		  msg = 'La Fecha Solución debe ser mayor al último update';
		  redir = 0;
		}
		else{
		  //Se realiza el update
		  update_cierre();
		  msg = "Caso Cerrado Correctamente";
		  redir = 1;
		}
	  }
	  else{
		msg = "La Fecha de Solución no puede estar en blanco";
		redir = 0;
	  }
	  ok = false;
	}
	else{
	  if(Date.parse(FechaEstado)<Date.parse(FechaLastUpd)){
		msg = 'La Fecha de cambio de Estatus debe ser mayor al último update';
		redir = 0;
	  }
	  else{
		//Se realiza el update
		update_cierre();
		msg = "Caso Actualizado Correctamente";
		redir = 1;  
	  }
	  ok = false;
	}
	
	if(ok == false){
	  if(redir == 0){
		alert(msg);
	  }else{
		alert(msg);
		var Idcaso = $("#Idcaso").val();
		var Estatus = $("#Estatus").val();
		var Cliente = $("#Cliente").val();
		var Usuario = $("#Usuario").val();
		var Prioridad = $("#Prioridad").val();
		var rangofechas = $("#rangofechas").val();
		var Producto = $("#Producto").val();
		$.ajax({
		  type: "POST",
		  url: "tablas/rsl_consulta_caso.php",
		  data: {Idcaso,Estatus,Cliente,Usuario,Prioridad,rangofechas,Producto},
		  success: function(data){
			$.getScript("tablas/js/buttons_exportjs.js");
			$("#result").html(data);
		  }
		});
		//window.location.reload(true);
	  }
	}
	return ok;
}