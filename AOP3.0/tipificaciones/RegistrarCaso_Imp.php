<?php include_once('../connections/Portal.php'); ?>
<?php
	
	$IdCaso = $_POST['idcaso'];
	$query = $Portal->query("SELECT * FROM implementaciones Where id_imp = '$IdCaso'");

if ($query->num_rows>0) {
	echo '<script type="text/javascript">
	alert("Número de Implementaciones IMP'.$IdCaso.' ya creado.. actualizando consulta")
	window.location.reload(true);
	</script>';
} 
else {
	
	$IdCaso = $_POST['idcaso'];
	$Cliente = $_POST['cliente'];
	$Prioridad = $_POST['prioridad'];
	$Producto = $_POST['producto'];
	$Medio = $_POST['medio'];
	$FechaReporte = $_POST['fechainicio'];
	$TipoImplementa = $_POST['tipoImplementa'];
	$Descripcion = $_POST['descripcion'];
	$TipificaCla = "SELECT Clase FROM clase WHERE id_Clase = ".$_POST['clase'];
	$TipificaCat = "SELECT Categoria FROM categoria WHERE id_Categoria = ".$_POST['categoria'];
	$Grupo = $_POST['usuario_asignado'];
	$Usuario = $_POST['usuario_log'];
	
	if (isset($_POST['idcaso']) && !empty($_POST['idcaso'])&& 
	isset($_POST['cliente']) && !empty($_POST['cliente'])&&
	isset($_POST['prioridad']) && !empty($_POST['prioridad'])&&
	isset($_POST['producto']) && !empty($_POST['producto'])&&
	isset($_POST['medio']) && !empty($_POST['medio'])&&
	isset($_POST['fechainicio']) && !empty($_POST['fechainicio'])&&
	isset($_POST['tipoImplementa']) && !empty($_POST['tipoImplementa'])&&
	isset($_POST['descripcion']) && !empty($_POST['descripcion'])&&
	isset($_POST['clase']) && !empty($_POST['clase'])&&
	isset($_POST['usuario_asignado']) && !empty($_POST['usuario_asignado'])) {
		
		$ResultaClase = mysqli_query($Portal,$TipificaCla);
		$RowClase = mysqli_fetch_row($ResultaClase);
		$Clase = $RowClase[0];

		$ResultaCat = mysqli_query($Portal,$TipificaCat);
		$RowCat = mysqli_fetch_row($ResultaCat);
		$Categoria = $RowCat[0];

		mysqli_query ($Portal,"INSERT INTO implementaciones (id_imp,cliente,prioridad,producto,escalado_imp,fecha_imp,tipo_imp,descripcion_imp,clase_imp,categoria_imp,usuario_asignado,estatus,fecha_upd,user_upd) 		
							VALUES('$IdCaso','$Cliente','$Prioridad','$Producto','$Medio','$FechaReporte','$TipoImplementa','$Descripcion','$Clase','$Categoria','$Grupo','Abierto',now(),'$Usuario');");
		
		mysqli_query ($Portal,"INSERT INTO log_imp (id_imp,fecha_cambio,estado_nuevo,prioridad_nuevo,grupo_nuevo,registro_trabajo,fecha_upd,usuario_upd)
						VALUES ('$IdCaso','$FechaReporte','Abierto','$Prioridad','$Grupo','$Descripcion',now(),'$Usuario');");
						
		mysqli_query ($Portal,"UPDATE log_imp SET efectividad=ANS_Scheme5x8(fecha_cambio,fecha_upd) WHERE id_imp = '$IdCaso';");
		//mysqli_query ($Portal,"UPDATE log_casos SET registro_trabajo= time_format(timediff(fecha_upd,fecha_cambio),'%H') WHERE id_caso = '$IdCaso';");
		
		echo "<script languaje=\"javascript\">alert('Número de Implementación: IMP$IdCaso');window.location='implementaciones_casos';</script>";
		//echo "<script languaje=\"javascript\">alert('Número de Caso: EP$IdCaso');window.location.reload(true);</script>";
	
	} 
	else { 
		echo "<script languaje=\"javascript\">alert('Por favor complete todos los campos obligatorios del formulario');</script>";
		//echo "<script languaje=\"javascript\">alert('Por favor complete todos los campos obligatorios del formulario');history.back();</script>";
	}
}	
?>
