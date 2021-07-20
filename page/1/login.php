<?php 
session_start();
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="all"> 
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <title>Bienvenida <?php echo  $link[3];?></title>
    <script type="text/javascript">

    $(document).ready(function() {   
      $('#exampleInputText1').on('blur',function(){

        var selectVal = $(this).val();
        //alert(selectVal);
      });
    });

    </script>

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

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if(isset($_SESSION['mensaje'])){echo $_SESSION['mensaje'];}else{echo $_SESSION['mensaje']='';} ?>


    </div>      
  </div>


</div>
</body>
</html>