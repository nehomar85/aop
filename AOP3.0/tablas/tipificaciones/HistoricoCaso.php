<?php include_once('../../connections/Portal.php'); ?>
<?php
if(isset($_GET))
	{
		$id_caso = $_GET["idcasohist"];
		$clase='<ul class="timeline">';
		$strConsulta = "select * from log_casos where id_caso = '$id_caso' order by 1 desc";
		$result = $Portal->query($strConsulta);
		while( $fila = $result->fetch_array() )
		{
			$clase.='<li><a>'.$fila["fecha_cambio"].'</a><a class="float-right">'.$fila["usuario_upd"].'</a><p>'.$fila["estado_nuevo"].'</p>
			<p>'.$fila["registro_trabajo"].'</p></li></br>';
			#$clase.=''.$fila["nuevo_estado"].'';
		}
		echo '</ul>'.$clase;
	}
?>