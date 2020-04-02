<?php
// Inicio session
session_start();
// Valida ingreso usuario
if (!$_SESSION) {
	echo '<script type="text/javascript">
	alert("Acceso restringido, Usuario no Autenticado");
	self.location = "/";
	</script>';
}

$url= $_SERVER["PHP_SELF"];// /AOP3.0/inicio.php
$url2= $_SERVER["REQUEST_URI"];// /AOP3.0/inicio

switch($url){
	case "/aop/admin_usuario.php": $acceso=$_SESSION['users_admin']; break;
	case "/aop/registrar_caso.php": $acceso=$_SESSION['casos_soporte']; break;
	case "/aop/consultar_caso.php": $acceso=$_SESSION['casos_soporte']; break;
	default: $acceso=1;
}

if($acceso != 1){
	echo '<script type="text/javascript">
	self.location = "401";
	//alert("'. $url .'");
	//alert("'. $acceso .'");
	</script>';
}

$id_usuario = $_SESSION['id'];
?>