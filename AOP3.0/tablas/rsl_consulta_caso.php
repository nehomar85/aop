<?php

//if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "frmSearch")) {
//comentarear if si viene por ajax	
	
	//include_once('connections/Portal.php');
	//AJAX
	include_once('../connections/Portal.php');
	
	echo "<div class='container-fluid'>";
	  echo "<div class='row'>";
		echo "<div class='col-md-12'>";
		  echo "<div class='card card-primary'>";
			echo "<div class='card-header'><h3 class='card-title'>Resultado búsqueda:</h3></div>";
			  echo "<div class='card-body'>";
	
	$sqlBasico = "SELECT *, max(log.fecha_cambio) fecha_upd_edo FROM casos LEFT JOIN log_casos log ON idCaso = log.id_caso WHERE ";
	
	if (isset($_POST['Idcaso']) and $_POST['Idcaso']!=""){
		$Idcaso = $_POST['Idcaso'];
		$sqlIdcaso = "idCaso LIKE '%$Idcaso%' AND ";
		echo $_POST['Idcaso'] . '   ';
	} else $sqlIdcaso = ""; 
	
	if (isset($_POST['Estatus']) and $_POST['Estatus']!=""){
		$Estatus = $_POST['Estatus'];
		$sqlEstatus = "estatus LIKE '%$Estatus%' AND ";
		echo $_POST['Estatus'] . '   ';
	} else $sqlEstatus = ""; 
	
	if (isset($_POST['Prioridad']) and $_POST['Prioridad']!=""){
		$Prioridad = $_POST['Prioridad'];
		$sqlPrioridad = "prioridad LIKE '%$Prioridad%' AND ";
		echo $_POST['Prioridad'] . '   ';
	} else $sqlPrioridad = ""; 
	
	if (isset($_POST['Cliente']) and $_POST['Cliente']!=""){
		$Cliente = $_POST['Cliente'];
		$sqlCliente = "cliente LIKE '%$Cliente%' AND ";
		echo $_POST['Cliente'] . '   ';
	} else $sqlCliente = ""; 
	
	if (isset($_POST['Usuario']) and $_POST['Usuario']!=""){
		$Usuario = $_POST['Usuario'];
		$sqlUsuario = "grupo LIKE '%$Usuario%' AND ";
		echo $_POST['Usuario'] . '   ';
	} else $sqlUsuario = ""; 
	
	if (isset($_POST['Producto']) and $_POST['Producto']!=""){
		$Producto = $_POST['Producto'];
		$sqlProducto = "producto LIKE '%$Producto%' AND ";
		echo $_POST['Producto'] . '   ';
	} else $sqlProducto = "";
	
	if (isset($_POST['rangofechas']) and $_POST['rangofechas']!=""){
		$Rango = $_POST['rangofechas'];
		$startDate = substr($_POST['rangofechas'],0,10);
		$endDate = substr($_POST['rangofechas'],13,10);
		$sqlRango = "date(fechaReporte) BETWEEN '$startDate' AND '$endDate' AND ";
		echo $_POST['rangofechas'] . '   ';
	} else $sqlRango = ""; 
	
	echo "<table id='casos2' class='table table-bordered table-hover table-striped responsive nowrap' style='zoom:80%;width:100%;'>";
	echo "<thead>";
	  echo "<tr>"; //3c8dbc 00c0ef
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>ID CASO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>PRODUCTO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>PRIORIDAD</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>MEDIO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>FEC. REPORTE</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8; display:none;'><center>DESCRIPCION</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>TIPO SERVICIO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>CLASE</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>CATEGORIA</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>USUARIO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>CLIENTE</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8; display:none;'><center>CAUSA RAIZ</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8; display:none;'><center>CATEGORIA RESOLUCION</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8; display:none;'><center>REGISTRO TRABAJO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>ESTATUS</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>FEC. SOLUCION</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>HORAS ANS</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8; display:none;'><center>REABIERTO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8; display:none;'><center>FEC. REABIERTO</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8;'><center>ULT. UPDATE</center></th>";
		echo "<th style='font-size:12px; color:#ffffff; background-color:#17a2b8'><center>REC</center></th>";
	  echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	echo "</br>";

	$sqlFinal = $sqlBasico . $sqlIdcaso . $sqlEstatus . $sqlPrioridad . $sqlCliente . $sqlUsuario . $sqlProducto . $sqlRango ." medio != '' GROUP BY 1 ORDER BY idCaso DESC";
	$resultSearch = mysqli_query($Portal, $sqlFinal);
	echo mysqli_num_rows($resultSearch);
	echo " Registros";
	echo '</br>';
	while($registro = mysqli_fetch_assoc($resultSearch)) {

		echo "<tr align='center'>";
		echo "<td style='border-color:#dedede;' id='idcaso".$registro['idCaso']."'><button type='button' class='border-0 bg-transparent edit' style='font-weight:bold;' value='".$registro['idCaso']."'>".$registro['idCaso']."</button></td>";
		echo "<td style='border-color:#dedede;' id='producto".$registro['idCaso']."'>".$registro['producto']."</td>";
		echo "<td style='border-color:#dedede;' id='prioridad".$registro['idCaso']."'>".$registro['prioridad']."</td>";
		echo "<td style='border-color:#dedede;' id='medio".$registro['idCaso']."'>".$registro['medio']."</td>";
		echo "<td style='border-color:#dedede;' id='fechaReporte".$registro['idCaso']."'>".$registro['fechaReporte']."</td>";
		echo "<td style='border-color:#dedede; display:none;' id='descripcion".$registro['idCaso']."'>".$registro['descripcion']."</td>";
		echo "<td style='border-color:#dedede;' id='tipoServicio".$registro['idCaso']."'>".$registro['tipoServicio']."</td>";
		echo "<td style='border-color:#dedede;' id='clase".$registro['idCaso']."'>".$registro['clase']."</td>";
		echo "<td style='border-color:#dedede;' id='categoria".$registro['idCaso']."'>".$registro['categoria']."</td>";		
		echo "<td style='border-color:#dedede;' id='grupo".$registro['idCaso']."'>".$registro['grupo']."</td>";
		echo "<td style='border-color:#dedede;' id='cliente".$registro['idCaso']."'>".$registro['cliente']."</td>";
		echo "<td style='border-color:#dedede; display:none;' id='causaRaiz".$registro['idCaso']."'>".$registro['causaRaiz']."</td>";
		echo "<td style='border-color:#dedede; display:none;' id='categoriaResolucion".$registro['idCaso']."'>".$registro['categoriaResolucion']."</td>";
		echo "<td style='border-color:#dedede; display:none;' id='registroTrabajo".$registro['idCaso']."'>".$registro['registroTrabajo']."</td>";
		echo "<td style='border-color:#dedede;' id='estatus".$registro['idCaso']."'>".$registro['estatus']."</td>";
		echo "<td style='border-color:#dedede;' id='fechaSolucion".$registro['idCaso']."'>".$registro['fechaSolucion']."</td>";
		echo "<td style='border-color:#dedede;' id='horasHabil".$registro['idCaso']."'>".$registro['horasSolANS']." hrs.</td>";
		echo "<td style='border-color:#dedede; display:none;' id='reabierto".$registro['idCaso']."'>".$registro['reabierto']."</td>";
		echo "<td style='border-color:#dedede; display:none;' id='fechaReabierto".$registro['idCaso']."'>".$registro['fechaReabierto']."</td>";
		echo "<td style='border-color:#dedede;' id='fecha_upd_edo".$registro['idCaso']."'>".$registro['fecha_upd_edo']."</td>";
		echo "<td style='border-color:#dedede;' id='historico".$registro['idCaso']."'><button type='button' class='border-0 bg-transparent fas fa-history record' value='".$registro['idCaso']."'/></a></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	
			echo "</div>";
		  echo "</div>";
		echo "</div>";
	  echo "</div>";
	echo "</div>";
//}
?>