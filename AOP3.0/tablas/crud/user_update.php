<?php

	include_once('../../connections/Portal.php');
	
	if(isset($_POST['iduser'])){	
		$iduser = $_POST['iduser'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$rolDes = $_POST['rol'];
			$queryRol = mysqli_query($Portal,"SELECT id FROM roles WHERE descripcion= '$rolDes'");
			$fila = mysqli_fetch_row($queryRol);
			$rol = $fila[0];
		$estado = $_POST['estado'];
		$updUser = "UPDATE users SET nombre='$nombre', apellido='$apellido', email='$email', rol_id='$rol', estado='$estado', updated_at=now() WHERE id='$iduser'";
		if (!$result = mysqli_query($Portal, $updUser)){
			exit(mysqli_error($Portal));
		}
			echo "Perfil de Usuario Actualizado";
	}

?>