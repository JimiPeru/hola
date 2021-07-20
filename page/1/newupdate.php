<?php 
ob_start(); 
session_start();
include '../../utils.php';

$name 	= trim($_POST['user']);
$username 	= trim($_POST['username']);
$pass 	= trim($_POST['pass']);
$rol 	= trim($_POST['rol']);


peticion_put($name,$username,$pass,$rol); 
   

    $_SESSION['mensaje']      = $name.' actualizado'; 
   
    header("Location: index.php");
    
ob_end_flush();
				
?>