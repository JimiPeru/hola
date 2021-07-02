<?php 
    $server     = "localhost";
    $username   = "root";
    $password   = "consorcio";
    $db         = "hola";
    $con        = mysqli_connect($server,$username,$password)or die("No se ha podido establecer la conexion");
    $sql        = 'CREATE DATABASE '.$db;
    if (mysqli_query($con, $sql)) {
        echo "La base de datos se creo correctamente <br>";
    } else {
        echo 'Error al crear la base de datos: ' . mysqli_error($con) . "\n";
    }

$tablauser='user';

    $userclave  = md5('adminpassword');

        $sql    = "CREATE TABLE IF NOT EXISTS $tablauser (
                name VARCHAR(50) PRIMARY KEY, 
                username VARCHAR(50) NULL,
                password VARCHAR(32) NULL,
                roles VARCHAR(50) NULL
        )";

        if ($con->query($sql) === TRUE) {
                $sql1 = "INSERT INTO $tablauser (name, username, password, roles) 
                VALUES ('Admin ', 'admin', '$userclave', 'ADMIN')";
                if ($con->query($sql1) === TRUE) {
                    echo "Registro ingresado correctamente";
                } else {
                    echo "Error ingreso: " . $con->error;
                }

        } else {
                 echo "Error creating table: " . $con->error;
        }

 ?> 