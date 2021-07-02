<?php 
$ver=$_SERVER['REQUEST_URI'];
$link=explode("/",$ver);

include '../../utils.php';
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

  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-4 ">

        <form  method="POST" action="frmlogin.php">
          <div class="form-group">
            <label for="exampleInputEmail1">User</label>
            <input type="text" class="form-control" id="exampleInputText1" name="user" aria-describedby="emailHelp"  required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" id="exampleInputPassword1" required>
          </div>

          <button type="submit" onclick="peticion_post('ADMIN', 'adminpassword');" class="btn btn-primary">Submit</button>
        </form>


    </div>      
  </div>


</div>
</body>
</html>