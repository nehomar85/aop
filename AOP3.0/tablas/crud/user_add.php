<?php

	include_once('../../connections/Portal.php');

	if(isset($_POST['insertUser'])){
		$nombre = $_POST['nombreReg'];
		$apellido = $_POST['apellidoReg'];
		$email = $_POST['emailReg'];
		$rolId = $_POST['rolReg'];
		$estado = $_POST['estadoReg'];
		$insUser = "INSERT INTO users (nombre, apellido, email, password, img, rol_id, estado, created_at)
					VALUES('$nombre', '$apellido', '$email', '123456', 'NULL', '$rolId', '$estado', now())";
		//$insUser = mysqli_query($Portal, $creUser);
		if (!$resultInsert = mysqli_query($Portal, $insUser)){
			exit(mysqli_error($Portal));
		}
			echo "Usuario Creado Correctamente";
	}

?>