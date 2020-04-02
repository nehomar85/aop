function valida(f) {
  var ok = true;
  var FechaReporte = $("#eFechaReporte2").val();
	var ReporteHr = FechaReporte.substring(11,13); var ReporteMin = FechaReporte.substring(14,16);
  var FechaSolucion = $("#eFechaSolucion2").val();
	var SolucionHr = FechaSolucion.substring(11,13); var SolucionMin = FechaSolucion.substring(14,16); var SolucionFecha = FechaSolucion.substring(0,10);
  var FechaSolucion2 = SolucionFecha.concat(" ",SolucionHr,":",SolucionMin,":00");
  var redir = 1;

  var msg = "Validaciones al Actualizar Caso:\n";
  if(f.elements["eEstatus2"].value == "Resuelto" || f.elements["eEstatus2"].value == "Cerrado"){
	if(FechaSolucion !== ""){
	  if(SolucionFecha <= FechaReporte){
		if(SolucionHr == ReporteHr){
			if(SolucionMin >= ReporteMin){
				//msg = "Se realiza update (evalua minuto)";
				update_cierre();
				msg = "Caso Cerrado Correctamente";
				redir = 1;
			}else{
				msg = "Fecha Solución debe ser mayor a Fecha Reporte (minuto)";
				redir = 0;
			}
		}
		if(SolucionHr > ReporteHr){
			update_cierre();
			msg = "Caso Cerrado Correctamente";
			redir = 1;
		}
		if(SolucionHr < ReporteHr){
			msg = "Fecha Solución debe ser mayor a Fecha Reporte";
			redir = 0;
		}  
	  }
	  else{
		//msg = "Se realiza el update";
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
	  update_cierre();
	  msg = "Caso Actualizado Correctamente";
	  ok = false;
  }

  if(ok == false){
	if(redir == 0){
		alert(msg);
	}else{
		alert(msg);
		window.location.reload(true);
	}
  }
  return ok;
}