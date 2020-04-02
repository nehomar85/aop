<?php 
// Session iniciada
session_start();

// Destruye la session
if ($_SESSION['nombre']) {
	session_destroy();
	echo '<script type="text/javascript">
	alert("Su sesion ha finalizado correctamente");
	self.location = "/"
	</script>';
}
else {
	echo '<script type="text/javascript">
	alert("Acceso restringido, Usuario no Autenticado");
	self.location = "/"
	</script>';	
}

?>
