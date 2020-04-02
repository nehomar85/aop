<?php include_once('../../connections/Portal.php'); ?>
<?php
//if(isset($_POST["cliente"]))
	//{
		$strConsulta = "SELECT max(substr(substring_index(id_imp,'-',1),4))+1 idcaso FROM implementaciones WHERE cliente = 'ASIC'";
		//$strConsulta = "SELECT max(substr(substring_index(id_imp,'-',1),4))+1 idcaso FROM implementaciones WHERE cliente = ".$_GET["cliente"];
		$result = $Portal->query($strConsulta);
		$fila = $result->fetch_array();
		$id_imp = $fila['idcaso'];

		echo $id_imp;
	//}

?>
