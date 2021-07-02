<?php 
session_start();
$ver=$_SERVER['REQUEST_URI'];
$link=explode("/",$ver);

include '../../sesion.php';
include '../../utils.php';
$page='PAGE_'.$link[3];
if($auth){
  if ($roles=='ADMIN'){}else {
    if($roles!=$page){header("Location: login.php");}
  }
}else{
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all"> 
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="all"> 
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

    <title>Bienvenida <?php echo $link[3];?></title>
</head>
<body>

<div class="container">

  <img class="p-2" width="150" src="../../img/hola.png" alt="Hola.com">
  <div class="float-right"><a href="salir.php">logout=> <?php echo $name ;?> </a></div>

  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-4 ">
      <h1>Hello <?php echo $link[3].' '.$name ;?> </h1>
      <?php echo $roles;?>
    </div>      
  </div>




</div>
</body>
</html>