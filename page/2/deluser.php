<?php 
session_start();
include '../../utils.php';

    $name=$_GET['name'];

    peticion_delete($name);


    $_SESSION['mensaje']=$name.' borrado';

    header('location: index.php')



?>