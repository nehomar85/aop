<?php include_once('../ss../connections/Portal.php'); ?>
<?php
if(isset($_POST["idclase"]))
	{
		$clase = '<option value="0"></option>';
		$strConsulta = "select * from categoria where id_Clase = ".$_POST["idclase"];
		$result = $Portal->query($strConsulta);
		while( $fila = $result->fetch_array() )
		{
			$clase.='<option value="'.$fila["id_Categoria"].'">'.$fila["Categoria"].'</option>';
		}
		echo $clase;
	}

/*if(isset($_POST["idcategoria"]))
	{
		$categoria = '<option value="0"></option>';
		$strConsultaTipo = "select * from tipo where id_Categoria = ".$_POST["idcategoria"];
		$resultTipo = $Portal->query($strConsultaTipo);
		while( $fila = $resultTipo->fetch_array() )
		{
			$categoria.='<option value="'.$fila["id_Tipo"].'">'.$fila["Tipo"].'</option>';
		}
		echo $categoria;
	}*/
?>
