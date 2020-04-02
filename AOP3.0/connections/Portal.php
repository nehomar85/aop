<?php
/* Database connection start */
$hostname_Portal = "localhost";
$username_Portal = "operador";
$password_Portal = "Xentya8pwY";
$database_Portal = "a_operaciones";

$Portal = mysqli_connect($hostname_Portal, $username_Portal, $password_Portal, $database_Portal) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>