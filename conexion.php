<?php 

	$server 	= "localhost";
	$username 	= "root";
	$password 	= "consorcio";
	$db 		= "hola";
	$con 		= mysqli_connect($server,$username,$password,$db)or die("No se ha podido establecer la conexion");
	$sdb 		= mysqli_select_db($con,$db)or die("La base de datos no existe");
?>

