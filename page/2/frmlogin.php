<?php 
ob_start(); 
session_start();
include '../../utils.php';

$name 	= trim($_POST['user']);
$pass 	= trim($_POST['pass']);
$auth	= False;
$rol    = '';

//echo $name;
//echo '<br>'.$pass.'<br>';

if (isset($_POST['user']) and isset($_POST['pass'])){
    $users=json_decode( peticion_get($name)); 
    //print_r($users);
   // echo $users->{'name'};
        if(trim($users->{'name'}) == $name and trim($users->{'password'}) == md5($pass)){

            $rol=$users->{'roles'};

            
        }

            $auth	= true;
           // echo '<br>'.$rol;
           $_SESSION['rol']         = $rol; 
           $_SESSION['auth']        = true; 
           $_SESSION['name']        = $name;
           $_SESSION['timeuser']    = time();
           $_SESSION['mensaje']     = ''; 
           header("Location: index.php");


}else{
    $_SESSION['mensaje']      = 'User o password incorrecto'; 
   
    header("Location: login.php");
    

}




ob_end_flush();
				
?>