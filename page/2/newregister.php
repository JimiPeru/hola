<?php 
ob_start(); 
session_start();
include '../../utils.php';

$name 	= trim($_POST['user']);
$username 	= trim($_POST['username']);
$pass 	= trim($_POST['pass']);
$rol 	= trim($_POST['rol']);

//echo $name;
if ( peticion_post($name,$username,$pass,$rol)){
    $_SESSION['mensaje']      = $name.' ya existe'; 
} else{
    $_SESSION['mensaje']      = $name.' creado'; 
}
  
   header("Location: register.php");
    
ob_end_flush();
				
?>