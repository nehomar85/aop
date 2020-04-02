<?php
include('connections/Portal.php');

$strProducto = "SELECT * FROM producto ORDER BY producto ASC";
$resultProducto = $Portal->query($strProducto);
$Producto = '<option value=""></option>';
while( $fila = $resultProducto->fetch_array() )
{
	$Producto.='<option value="'.$fila["producto"].'">'.$fila["producto"].'</option>';
}

$strPrioridad = "SELECT * FROM prioridad ORDER BY Prioridad ASC";
$resultPrioridad = $Portal->query($strPrioridad);
$Prioridad = '<option value=""></option>';
while( $fila = $resultPrioridad->fetch_array() )
{
	$Prioridad.='<option value="'.$fila["Prioridad"].'">'.$fila["Prioridad"].'</option>';
}

$strMedio = "SELECT * FROM medio ORDER BY Medio ASC";
$resultMedio = $Portal->query($strMedio);
$Medio = '<option value=""></option>';
while( $fila = $resultMedio->fetch_array() )
{
	$Medio.='<option value="'.$fila["Medio"].'">'.$fila["Medio"].'</option>';
}

$strTipoServicio = "SELECT * FROM tiposervicio ORDER BY TipoServicio ASC";
$resultTipoServicio = $Portal->query($strTipoServicio);
$TipoServicio = '<option value=""></option>';
while( $fila = $resultTipoServicio->fetch_array() )
{
	$TipoServicio.='<option value="'.$fila["TipoServicio"].'">'.$fila["TipoServicio"].'</option>';
}

$strClase = "SELECT * FROM clase ORDER BY Clase ASC";
$resultClase = $Portal->query($strClase);
$Clase = '<option value=""></option>';
while( $fila = $resultClase->fetch_array() )
{
	$Clase.='<option value="'.$fila["Clase"].'">'.$fila["Clase"].'</option>';
}


$strCategoria = "SELECT distinct(Categoria) Categoria FROM categoria ORDER BY Categoria ASC";
$resultCategoria = $Portal->query($strCategoria);
$Categoria = '<option value=""></option>';
while( $fila = $resultCategoria->fetch_array() )
{
	$Categoria.='<option value="'.$fila["Categoria"].'">'.$fila["Categoria"].'</option>';
}

$strGrupo = "SELECT * FROM grupo ORDER BY Grupo ASC";
$resultGrupo = $Portal->query($strGrupo);
$Grupo = '<option value=""></option>';
while( $fila = $resultGrupo->fetch_array() )
{
	$Grupo.='<option value="'.$fila["Grupo"].'">'.$fila["Grupo"].'</option>';
}

$strCliente = "SELECT * FROM cliente ORDER BY Cliente ASC";
$resultCliente = $Portal->query($strCliente);
$Cliente = '<option value=""></option>';
while( $fila = $resultCliente->fetch_array() )
{
	$Cliente.='<option value="'.$fila["cliente"].'">'.$fila["cliente"].'</option>';
}

$strCategoriaResolucion = "SELECT * FROM catresolucion ORDER BY CatResolucion ASC";
$resultCategoriaResolucion = $Portal->query($strCategoriaResolucion);
$CategoriaResolucion = '<option value=""></option>';
while( $fila = $resultCategoriaResolucion->fetch_array() )
{
	$CategoriaResolucion.='<option value="'.$fila["id_Resolucion"].'">'.$fila["CatResolucion"].'</option>';
}

$strEstatus = "SELECT * FROM estatus ORDER BY Estatus ASC";
$resultEstatus = $Portal->query($strEstatus);
$Estatus = '<option value=""></option>';
while( $fila = $resultEstatus->fetch_array() )
{
	$Estatus.='<option value="'.$fila["Estatus"].'">'.$fila["Estatus"].'</option>';
}

?>