<?php 
ob_start(); 
session_start();
include '../../sesion.php';
include '../../conexion.php';
include '../../utils.php';

$name 	= trim($_POST['user']);
$pass 	= trim($_POST['pass']);
$auth	= False;

if ( isset($name) && isset($pass))
{   $auth = false;
    $result=array();
    $respuesta=peticion_post($name, $pass);

    $result= explode(',', $respuesta);
	$result2= explode(":", end($result));
    $user1= explode(":", $result[3]);
    $user= str_replace('"', '', $user1[1]); 
	$resultf=str_replace('"','', substr( end($result2),0, -1 ));
    $roles = $resultf;

    $auth                   = true;
    $_SESSION['auth']       = $auth   ;
    $_SESSION['name']       = $name   ;					
    $_SESSION['username']   = $user   ;
    $_SESSION['password']   = $pass   ;
    $_SESSION['roles']      = $roles   ;

header("Location: index.php");
}else{
	header("Location: login.php");
}

ob_end_flush();
				
?>