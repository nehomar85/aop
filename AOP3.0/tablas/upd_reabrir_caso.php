<?php
if(isset($_POST)){
	
	include_once('../connections/Portal.php');
	
	$Idcaso = $_POST['eIdcaso'];
	$Producto = $_POST['eProducto'];
	$reabrirSQL = "UPDATE casos SET estatus='Abierto', fechaSolucion=NULL, reabierto='Si', fechaReabierto=now(), horasSolTotal=NULL, horasSolANS=NULL, cumpleANS=NULL WHERE idCaso= '$Idcaso'";
	$resultSQL = mysqli_query($Portal, $reabrirSQL);
	/*echo "<script>
			alert('Caso Reabierto Correctamente: ".$Producto.$Idcaso."');
			location.href = 'consultar_caso';
		</script>";*/
}
?>