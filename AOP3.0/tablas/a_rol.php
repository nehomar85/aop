<?php
	include_once('../connections/Portal.php');
	
	$rolName = $_POST['rolName'];
	$qwe = $_POST['rolId'];
	$res = $Portal->query("SELECT users_admin, casos_soporte, monitoreo, indicadores, bitacoras, tracker, procesos, cambio_usuario, reabrir FROM roles WHERE descripcion = '$rolName'");
	$row = $res->fetch_array();
	$hola = array($row);
	$nombre = array('Admin. usuarios','Casos Soporte','Monitoreo','Indicadores','Bitacoras','Tracker','Procesos','Cambiar Usuario','Reabrir Caso');
	$idCheck = array('users_admin','casos_soporte','monitoreo','indicadores','bitacoras','tracker','procesos','cambio_usuario','reabrir');
	
	//Cuenta el numero de elementos
	$longitud = count($hola);

	//Recorroe todos los elementos
	for($i=0; $i<9; $i++){
		//Valor de cada elemento
		if($row[$i]!=0){
			echo "<div class='custom-control custom-checkbox'>";
			  echo "<input class='custom-control-input' type='checkbox' id='$idCheck[$i]' checked>";
			  echo "<label for='$idCheck[$i]' class='custom-control-label'>$nombre[$i]</label>";
			echo "</div>";
		} else {
			echo "<div class='custom-control custom-checkbox'>";
			  echo "<input class='custom-control-input' type='checkbox' id='$idCheck[$i]' >";
			  echo "<label for='$idCheck[$i]' class='custom-control-label'>$nombre[$i]</label>";
			echo "</div>";
		}
	}

	//Set the Content-Type header to application/json. Para enviar Json
	//header('Content-Type: application/json');
	//echo json_encode($hola);

?>