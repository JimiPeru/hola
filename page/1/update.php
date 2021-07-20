<?php 
session_start();
$ver=$_SERVER['REQUEST_URI'];
$link=explode("/",$ver);

include '../../utils.php';

$users=json_decode( peticion_get($_GET['name'])); 
//print_r($users);
//echo $users->{'name'};
//echo $users->{'roles'};

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
       // alert(selectVal);
      });
    });

    </script>

</head>
<body>

<div class="container">

  <img class="p-2" width="150" src="../../img/hola.png" alt="Hola.com">
  <div class="float-right"><a href="salir.php">logout=><?php echo $_SESSION['name'];?> </a></div>
  <center><h1>Modificar usuarios</h1></center>
  <div class="row justify-content-center">

    <div class="col-sm-12 col-md-4 ">
    
        <form  method="POST" action="newupdate.php">
            
          <div class="form-group">
            <label for="exampleInputEmail1">User</label>
            <input type="text" class="form-control" id="exampleInputText1" name="user" aria-describedby="user" value="<?php echo $users->{'name'};?>" readonly required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail2">User Name</label>
            <input type="text" class="form-control" id="exampleInputText2" name="username" aria-describedby="username" value="<?php echo $users->{'username'};?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" id="exampleInputPassword1" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Rol</label>
            <select class="form-control" id="exampleInputText3" name="rol" aria-describedby="rol"  required>

            
                <option 
                <?php if ($users->{'roles'}=='PAGE_1'){echo 'selected';} ?>
                value="PAGE_1">PAGE_1</option>
                
                <option 
                <?php if ($users->{'roles'}=='PAGE_2'){echo 'selected';} ?>
                value="PAGE_2">PAGE_2</option>
              
            </select>
          </div>

          <button type="submit"  class="btn btn-primary">Submit</button>
          <?php if(isset($_SESSION['mensaje'])){echo $_SESSION['mensaje'];}else{echo $_SESSION['mensaje']='';} ?>
        </form>
        
        <a href="index.php" type="button" rol="button" class="btn btn-sm btn-success float-right" >ver usuarios</a>


    </div>      
  </div>


</div>
</body>
</html>