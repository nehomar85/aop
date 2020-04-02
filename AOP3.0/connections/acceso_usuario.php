<?php require_once('Portal.php'); ?>
<?php 
// Inicio variable de session
if (!isset($_SESSION)) {
	session_start();
}

$Usuario = $_POST['email'];
$Password = $_POST['password'];

#$queryUser = "SELECT * FROM users WHERE email = '".$Usuario."' and password = '".$Password."'";
$queryUser = "SELECT u.*, r.* FROM users u LEFT JOIN roles r on u.rol_id = r.id WHERE email = '".$Usuario."' and password = '".$Password."'";
$resultUser = mysqli_query($Portal,$queryUser);
$usuario = mysqli_fetch_array($resultUser);

/* Consulta ROLES
$queryRol = "SELECT u.*, r.* FROM users u LEFT JOIN roles r on u.rol_id = r.id WHERE email = '".$Usuario."' and password = '".$Password."'";
$resultRol = mysqli_query($Portal,$queryRol);
$rol = mysqli_fetch_array($resultRol);*/

if ($usuario[0]) {
	if ($usuario['estado'] == 1) {
	// Definicion variables de sesion
	$_SESSION['id'] = $usuario['id']; 
	$_SESSION['nombre'] = $usuario['nombre'];
	$_SESSION['apellido'] = $usuario['apellido'];
	$_SESSION['password'] = $usuario['password'];
	$_SESSION['rol_id'] = $usuario['rol_id']; 
	$_SESSION['estado'] = $usuario['estado'];
	$_SESSION['users_admin'] = $usuario['users_admin'];
	$_SESSION['casos_soporte'] = $usuario['casos_soporte'];
	$_SESSION['monitoreo'] = $usuario['monitoreo'];
	$_SESSION['indicadores'] = $usuario['indicadores'];
	$_SESSION['bitacoras'] = $usuario['bitacoras'];
	$_SESSION['tracker'] = $usuario['tracker'];
	$_SESSION['procesos'] = $usuario['procesos'];
	$_SESSION['cambio_usuario'] = $usuario['cambio_usuario'];
	$_SESSION['reabrir'] = $usuario['reabrir'];
	//header("Location: ../inicio.php");
	echo true;
	
	}
	else {
		echo 'Usuario inactivo, verifique con el administrador';		
	}
}
else{
	echo 'Email y/o Password incorrectos, favor verifique';
}

?>