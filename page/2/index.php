<?php 
session_start();
$ver=$_SERVER['REQUEST_URI'];
$link=explode("/",$ver);

include '../../utils.php';
$page='PAGE_'.$link[3];
$name='';
$users=json_decode( peticion_get($name)); 
$auth				=	$_SESSION['auth'];
$rol				=	$_SESSION['rol'];
$name				=	$_SESSION['name'];
$minutes = 3000; //300 segundos o 5 minutos de inactividad

if (time()- $_SESSION['timeuser'] >=$minutes){
  $auth=false;
}else{
  $_SESSION['timeuser']=time();
}

if($auth){
  if ($rol=='ADMIN' or $rol=='PAGE_'.$link[3]){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="all"> 
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <title>Bienvenid@ <?php echo  $link[3];?></title>
</head>
<body>

<div class="container">

  <img class="p-2" width="150" src="../../img/hola.png" alt="Hola.com">
  <div class="float-right"><a href="salir.php">logout=><?php echo $name;?> </a></div>

  <div class="row justify-content-center">
    <div class="col-sm-12  ">
      <h1>Hello <?php echo $link[3].' '.$name;?> </h1>
    </div>   
    <div class="col-sm-12  ">
   <?php
   //ok desde postman directo a la api y desde la función ok, sin cambios


    echo '<table class="table table-bordered border-primary">
    <tr>
    <th id="columna1" scope="col">NAME</th>
    <th scope="col">USERNAME</th>
    <th scope="col">PASSWORD (Encriptado)</th>
    <th class="text-center" scope="col">ROLES</th>
    <th class="text-center" scope="col">ACCIÓN';
    if ($rol=='ADMIN'){ 
    echo '<a href="register.php" class="btn btn-secondary btn-sm mx-1 px-1" role="button" aria-pressed="true">+New </a> </th>';
    }
    echo '
  </tr>
</thead>
<tbody>
';
    for($i=0;$i<count($users);$i++){
    //print_r( $users[$i]->name.'<br>');
      if ($users[$i]->roles=='ADMIN'){}else{
        if ($users[$i]->roles=='PAGE_'.$link[3]){
                  echo '
                  <tr>
                <th id="user'.$i.'" name="'.$i.'" class="listai" scope="row">'.$users[$i]->name.'</th>
                <td>'.$users[$i]->username.'</td>';
                
              if ($rol=='ADMIN'){
                echo ' <td>'.$users[$i]->password.'</td>
                <td class="text-center">'.$users[$i]->roles.'</td>
                <td class="text-center"><a href="update.php?name='.$users[$i]->name.'" class="btn btn-secondary btn-sm mx-1 px-1" role="button" aria-pressed="true">Edit </a><a href="deluser.php?name='.$users[$i]->name.'" type="button" class="btn btn-secondary btn-sm mx-1 px-1 listadoi">  Del</a></td>
                </tr>';}else{
                  echo ' <td></td>
                  <td class="text-center">'.$users[$i]->roles.'</td>
                  <td class="text-center"></td>
                  </tr>';
                }

                
        }

        
      }
      
    }

    echo '
    
    </tbody>
    </table>';



    //ok desde postman directo a la api y desde la función ok, funcionando y probado 16/7/2021
    //peticion_delete('User4');    

    //desde postman directo a la api ok y desde la funcion ok, funcionando y probado 16/7/2021
    //peticion_put('User9','usernine','PadreDiosMio','PAGE_2'); 

    //desde postman ok y desde la funcion ok, misma api y ajustado funcionando y probado 16/7/2021
    //peticion_post('User19','user19','padreDiosMio','PAGE_1'); 
    
    //desde postman ok y desde la funcion ok, misma api funcionando y probado 16/7/2021
    //peticion_get()

    
    if(isset($_SESSION['mensaje'])){ 
      echo '<div>'. $_SESSION['mensaje'].'</div>';
      $_SESSION['mensaje']='';
    }
    ?> 

    </div>   
 
  </div>

</div>


<script>

</body>
</html>

<?php
  }else {
    header("HTTP/1.1 403");
    $_SESSION = array();
    session_destroy(); 
  }

}else{

    header("HTTP/1.1 302");
    header("Location: login.php");
}

?>