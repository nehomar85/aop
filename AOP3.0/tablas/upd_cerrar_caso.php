<?php include_once('../connections/Portal.php'); ?>
<?php
// check request
if(isset($_POST)){
	
    $idcaso = $_POST['idcaso'];
    $producto = $_POST['producto'];
    $prioridad = $_POST['prioridad'];
	$medio = $_POST['medio'];
	$tipoServicio = $_POST['tipoServicio'];
    $descripcion = $_POST['descripcion'];
    $clase = $_POST['clase'];
    $categoria = $_POST['categoria'];
	$grupo = $_POST['grupo'];
    $cliente = $_POST['cliente'];
	$CatResol = "SELECT CatResolucion FROM catresolucion WHERE id_Resolucion = ".$_POST['categoriaResolucion'];
		$ResultaCatResol = mysqli_query($Portal, $CatResol);
		$RowCatResol = mysqli_fetch_row($ResultaCatResol);
		$categoriaResolucion = $RowCatResol[0];
	$CausaRaiz = "SELECT CausaRaiz FROM causaraiz WHERE id_Causa = ".$_POST['causaRaiz'];
		$ResultaCausaRaiz = mysqli_query($Portal, $CausaRaiz);
		$RowCausaRaiz = mysqli_fetch_row($ResultaCausaRaiz);
		$causaRaiz = $RowCausaRaiz[0];
    $registroTrabajo = $_POST['registroTrabajo'];
    $estatus = $_POST['estatus'];
	$fechaEstado = $_POST['fechaEstado'];
    $fechaSolucion = $_POST['fechaSolucion'];
	$Usuario = $_POST['usuario_log'];
	
	if(empty($fechaEstado)){
		date_default_timezone_set('America/Bogota');
		$fechaEstadoActual = date("Y-m-d H:i:s");
	}else{
		$date=date_create($_POST['fechaEstado']);
		$fechaEstadoActual = date_format($date,"Y-m-d H:i:s");
		//$fechaEstadoActual = date_format($_POST['fechaEstado'],"Y-m-d H:i:s");
	}
	
	$ans_query = mysqli_query($Portal,"SELECT ans FROM cliente WHERE cliente = '$cliente'");
	$ans_res = $ans_query->fetch_array();
	$ans_cliente = $ans_res["ans"];
	
	if($estatus == "Resuelto" || $estatus == "Cerrado"){
		
		$query_hora_previo = mysqli_query($Portal,"SELECT fecha_cambio FROM log_casos WHERE id_log in (SELECT max(id_log) FROM log_casos where id_caso='$idcaso');");
		$fila_hr = $query_hora_previo->fetch_array();
		$hora_previo = $fila_hr["fecha_cambio"];
		
		$insert_upd = "INSERT INTO log_casos (id_caso,fecha_cambio,estado_nuevo,prioridad_nuevo,grupo_nuevo,registro_trabajo,fecha_upd,usuario_upd)
						VALUES ('$idcaso','$fechaSolucion','$estatus','$prioridad','$grupo','$registroTrabajo',now(),'$Usuario')";
		mysqli_query($Portal, $insert_upd);
		
		$query_ultimo_reg = mysqli_query($Portal,"SELECT id_log FROM log_casos WHERE id_caso = '$idcaso' ORDER BY 1 DESC LIMIT 1,1");
		$fila = $query_ultimo_reg->fetch_array();
		$ultimo_reg = $fila["id_log"];
		
		if($ans_cliente == "5x8"){
			$horas_upd = "UPDATE log_casos SET horas_total=ANS_Scheme5x8('$hora_previo','$fechaSolucion') WHERE id_log = '$ultimo_reg'";
			mysqli_query($Portal, $horas_upd);
			
			$query_ans = mysqli_query($Portal,"SELECT ROUND(SUM(horas_total),2) AS hrs_cierre_ans FROM log_casos WHERE estado_nuevo IN ('Pendiente por Cliente') AND id_caso = '$idcaso'");
			$fila = $query_ans->fetch_array();
			$cierre_ans = $fila["hrs_cierre_ans"];
				
			$cierre_caso = "UPDATE casos SET producto='$producto', prioridad='$prioridad', medio='$medio', tipoServicio='$tipoServicio', descripcion='$descripcion', clase='$clase',
			categoria='$categoria', grupo='$grupo', cliente='$cliente', causaRaiz='$causaRaiz', categoriaResolucion='$categoriaResolucion', registroTrabajo='$registroTrabajo',
			estatus='$estatus', fechaSolucion='$fechaSolucion', horasSolTotal=ANS_Scheme5x8(fechaReporte,'$fechaSolucion'), horasSolANS=(ANS_Scheme5x8(fechaReporte,'$fechaSolucion') - '$cierre_ans')
			WHERE idCaso='$idcaso'";
		}
		else{
			/*///REVISAR ANS 7X24
			$horas_upd = "UPDATE log_casos SET horas_total=CONCAT(HOUR(TIMEDIFF('$fechaSolucion','$hora_previo')),'.',MINUTE(TIMEDIFF('$fechaEstadoActual','$hora_previo'))) WHERE id_log = '$ultimo_reg'";
			mysqli_query($Portal, $horas_upd);
			
			$query_ans = mysqli_query($Portal,"SELECT ROUND(SUM(horas_total),2) AS hrs_cierre_ans FROM log_casos WHERE estado_nuevo IN ('Pendiente por Cliente') AND id_caso = '$idcaso'");
			$fila = $query_ans->fetch_array();
			$cierre_ans = $fila["hrs_cierre_ans"];
			
			$cierre_caso = "UPDATE casos SET producto='$producto', prioridad='$prioridad', medio='$medio', tipoServicio='$tipoServicio', descripcion='$descripcion', clase='$clase',
			categoria='$categoria', grupo='$grupo', cliente='$cliente', causaRaiz='$causaRaiz', categoriaResolucion='$categoriaResolucion', registroTrabajo='$registroTrabajo',
			estatus='$estatus', fechaSolucion='$fechaSolucion', horasSolTotal=CONCAT(HOUR(TIMEDIFF('$fechaSolucion',fechaReporte)),'.',MINUTE(TIMEDIFF('$fechaSolucion',fechaReporte))),
			horasSolANS=CONCAT(HOUR(TIMEDIFF('$fechaSolucion',fechaReporte) - '$cierre_ans'),'.',MINUTE(TIMEDIFF('$fechaSolucion',fechaReporte) - '$cierre_ans')) WHERE idCaso='$idcaso'";
			*/
		}
		
		mysqli_query($Portal, $cierre_caso);
		
		$cumpleANS = "UPDATE casos SET cumpleANS=(Cumple_ANS('$idcaso')) where idCaso = '$idcaso'";
		
		if (!$result = mysqli_query($Portal, $cumpleANS)){
			exit(mysqli_error($Portal));
		}

	}
	
	else{

		$query_hora_previo = mysqli_query($Portal,"SELECT fecha_cambio FROM log_casos WHERE id_log in (SELECT max(id_log) FROM log_casos where id_caso='$idcaso');");
		$fila_hr = $query_hora_previo->fetch_array();
		$hora_previo = $fila_hr["fecha_cambio"];
		
		$insert_upd = "INSERT INTO log_casos (id_caso,fecha_cambio,estado_nuevo,prioridad_nuevo,grupo_nuevo,registro_trabajo,fecha_upd,usuario_upd)
						VALUES ('$idcaso','$fechaEstadoActual','$estatus','$prioridad','$grupo','$registroTrabajo',now(),'$Usuario')";
		mysqli_query($Portal, $insert_upd);
		
		$query_ultimo_reg = mysqli_query($Portal,"SELECT id_log FROM log_casos WHERE id_caso = '$idcaso' ORDER BY 1 DESC LIMIT 1,1");
		$fila = $query_ultimo_reg->fetch_array();
		$ultimo_reg = $fila["id_log"];
		
		if($ans_cliente == "5x8"){
			$horas_upd = "UPDATE log_casos SET horas_total=ANS_Scheme5x8('$hora_previo','$fechaEstadoActual') WHERE id_log = '$ultimo_reg'";
			mysqli_query($Portal, $horas_upd);
		}
		else{
			/*///REVISAR ANS 7X24
			$horas_upd = "UPDATE log_casos SET horas_total=CONCAT(HOUR(TIMEDIFF('2020-01-17 20:20:00','2020-01-17 17:20:00')),'.',MINUTE(TIMEDIFF('2020-01-17 20:20:00','2020-01-17 17:20:00'))); WHERE id_log = '$ultimo_reg'";
		   #$horas_upd = "UPDATE log_casos SET horas_total=CONCAT(HOUR(TIMEDIFF('$fechaEstadoActual','$hora_previo')),'.',MINUTE(TIMEDIFF('$fechaEstadoActual','$hora_previo'))) WHERE id_log = '$ultimo_reg'";
			mysqli_query($Portal, $horas_upd);
			*/
		}
		
		$query_upd = "UPDATE casos SET prioridad='$prioridad', producto='$producto', medio='$medio', tipoServicio='$tipoServicio', descripcion='$descripcion', clase='$clase', categoria='$categoria',
		grupo='$grupo', cliente='$cliente', causaRaiz='$causaRaiz', categoriaResolucion='$categoriaResolucion', registroTrabajo='$registroTrabajo', estatus='$estatus'
		WHERE idCaso = '$idcaso'";
		
		if (!$result = mysqli_query($Portal, $query_upd)){
			exit(mysqli_error($Portal));
		}
	
	}
}
?>