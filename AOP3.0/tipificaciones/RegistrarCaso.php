<?php include_once('../connections/Portal.php'); ?>
<?php
	
	$IdCaso = $_POST['idcaso'];
	$query = $Portal->query("SELECT * FROM casos Where idCaso = '$IdCaso'");

if ($query->num_rows>0) {
	echo '<script type="text/javascript">
	alert("Número de Caso '.$IdCaso.' ya creado.. actualizando consulta")
	window.location.reload(true);
	</script>';
} 
else {
	
	$IdCaso = $_POST['idcaso'];
	$Producto = $_POST['producto'];
	$Prioridad = $_POST['prioridad'];
	$Medio = $_POST['medio'];
	$FechaReporte = $_POST['fechainicio'];
	$Descripcion = $_POST['descripcion'];
	$TipoServicio = $_POST['tiposervicio'];
	$TipificaCla = "SELECT Clase FROM clase WHERE id_Clase = ".$_POST['clase'];
	$TipificaCat = "SELECT Categoria FROM categoria WHERE id_Categoria = ".$_POST['categoria'];
	$Grupo = $_POST['grupo'];
	$Cliente = $_POST['cliente'];
	$Usuario = $_POST['usuario_log'];

	if (isset($_POST['idcaso']) && !empty($_POST['idcaso'])&& 
	isset($_POST['producto']) && !empty($_POST['producto'])&&
	isset($_POST['prioridad']) && !empty($_POST['prioridad'])&&
	isset($_POST['fechainicio']) && !empty($_POST['fechainicio'])&&
	isset($_POST['medio']) && !empty($_POST['medio'])&&
	isset($_POST['descripcion']) && !empty($_POST['descripcion'])&&
	isset($_POST['tiposervicio']) && !empty($_POST['tiposervicio'])&&
	isset($_POST['clase']) && !empty($_POST['clase'])&&
	//isset($_POST['categoria']) && !empty($_POST['categoria'])&&
	isset($_POST['grupo']) && !empty($_POST['grupo'])&&
	isset($_POST['cliente']) && !empty($_POST['cliente'])) {
		
		$ResultaClase = mysqli_query($Portal,$TipificaCla);
		$RowClase = mysqli_fetch_row($ResultaClase);
		$Clase = $RowClase[0];

		$ResultaCat = mysqli_query($Portal,$TipificaCat);
		$RowCat = mysqli_fetch_row($ResultaCat);
		$Categoria = $RowCat[0];

		mysqli_query ($Portal,"INSERT INTO casos (idCaso,prioridad,medio,fechaReporte,tipoServicio,descripcion,clase,categoria,grupo,cliente,estatus,producto) 		
							VALUES('$IdCaso','$Prioridad','$Medio','$FechaReporte','$TipoServicio','$Descripcion','$Clase','$Categoria','$Grupo','$Cliente','Abierto','$Producto');");
		
		mysqli_query ($Portal,"INSERT INTO log_casos (id_caso,fecha_cambio,estado_nuevo,prioridad_nuevo,grupo_nuevo,registro_trabajo,fecha_upd,usuario_upd)
						VALUES ('$IdCaso','$FechaReporte','Abierto','$Prioridad','$Grupo','$Descripcion',now(),'$Usuario');");
						
		mysqli_query ($Portal,"UPDATE log_casos SET efectividad=ANS_Scheme5x8(fecha_cambio,fecha_upd) WHERE id_caso = '$IdCaso';");
		//mysqli_query ($Portal,"UPDATE log_casos SET registro_trabajo= time_format(timediff(fecha_upd,fecha_cambio),'%H') WHERE id_caso = '$IdCaso';");
		
		echo "<script languaje=\"javascript\">alert('Número de Caso: $Producto$IdCaso');window.location='registrar_caso';</script>";
		//echo "<script languaje=\"javascript\">alert('Número de Caso: EP$IdCaso');window.location.reload(true);</script>";
	
	} 
	else { 
		echo "<script languaje=\"javascript\">alert('Por favor complete todos los campos obligatorios del formulario');</script>";
		//echo "<script languaje=\"javascript\">alert('Por favor complete todos los campos obligatorios del formulario');history.back();</script>";
	}
}	
?>
