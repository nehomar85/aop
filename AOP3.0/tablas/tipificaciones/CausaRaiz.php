<?php include_once('../../connections/Portal.php'); ?>
<?php
if(isset($_GET["idCatResolucion"]))
	{
		$clase = '<option value=""></option>';
		//$conexion= new mysqli("localhost","root","","operaciones");
		$strConsulta = "select * from causaraiz where id_Resolucion = ".$_GET["idCatResolucion"];
		$result = $Portal->query($strConsulta);
		while( $fila = $result->fetch_array() )
		{
			$clase.='<option value="'.$fila["id_Causa"].'">'.$fila["CausaRaiz"].'</option>';
		}
		echo $clase;
	}

?>
