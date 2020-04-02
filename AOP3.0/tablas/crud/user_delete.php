<?php

	include_once('../../connections/Portal.php');

	if(isset($_POST['iduser'])){
	$iduser = $_POST['iduser'];
	
		$sqlborrar="DELETE FROM users WHERE id=$iduser";
		$resborrar=mysqli_query($Portal,$sqlborrar);
		
		echo "Usuario eliminado correctamente";
	}
	
?>