<?php

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $varName=$data['name'];
    $varPass=md5($data['password']);

    header("HTTP/1.1 200 Metodo permitido");
    mysqli_query ($con,"SET NAMES 'utf8'");
    $re=mysqli_query($con,"SELECT * from user WHERE name='$varName' and password='$varPass'  ")or die(mysqli_error());
    $f=mysqli_fetch_array($re);
    echo json_encode($f);

}

 if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("HTTP/1.1 200 Metodo permitido");
    mysqli_query ($con,"SET NAMES 'utf8'");
    $re=mysqli_query($con,"SELECT * from user   ")or die(mysqli_error());
    $f=mysqli_fetch_array($re);
    echo json_encode($f);
}

 if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $varName='user7';
    $userName='user7';
    $varPass=md5('123456');
    $varRoles='PAGE_2';

    header("HTTP/1.1 200 Metodo permitido");
    mysqli_query ($con,"SET NAMES 'utf8'");
    $re = "INSERT INTO user (name, username, password, roles) 
    VALUES ('$varName ','$userName ', '$varPass', '$varRoles')";

    if ($con->query($re) === TRUE) {
        echo "Registro ingresado successfully ".  $varName;
    } else {
        echo "Error ingreso: " . $con->error;
    }
 }
 if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $varName='user7';
    header("HTTP/1.1 200 Metodo permitido");
    mysqli_query ($con,"SET NAMES 'utf8'");
    $res=mysqli_query($con,"SELECT name from user WHERE name='$varName'  ")or die(mysqli_error());
    $re=mysqli_query($con,"DELETE from user WHERE name='$varName'  ")or die(mysqli_error());
    $f=mysqli_fetch_array($res);
    $result= explode(",", json_encode($f));
	$result2= explode(":", end($result));
	$resultf=str_replace('"','', substr( end($result2),0, -1 ));
    echo $resultf .' eliminado ';
 }

?>