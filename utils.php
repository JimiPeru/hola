<?php

  //Abrir conexion a la base de datos
  function connect($db)
  {
      try {
          $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password']);

          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          return $conn;
      } catch (PDOException $exception) {
          exit($exception->getMessage());
      }
  }


 //Obtener parametros para updates
 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
	}

  //Asociar todos los parametros a un sql
	function bindAllValues($statement, $params)
  {
		foreach($params as $param => $value)
    {
				$statement->bindValue(':'.$param, $value);
		}
		return $statement;
   }

   function peticion_post($name,$username, $password, $roles){
      $urlPost='http://localhost/hola2/api.php';
      //$cnxCliente = curl_init($urlPost);
      $cnxCliente = curl_init();
      curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
      $datosEnvio = array();
      $datosEnvio['name'] = $name;
      $datosEnvio['username'] = $username;
      $datosEnvio['password'] = $password;
      $datosEnvio['roles'] = $roles;
      $datosEnviop = json_encode($datosEnvio);
      curl_setopt($cnxCliente, CURLOPT_POST, true);
      curl_setopt($cnxCliente, CURLOPT_POSTFIELDS, $datosEnviop);
      curl_setopt($cnxCliente, CURLOPT_RETURNTRANSFER, true); 
      $url_contentrpta = curl_exec($cnxCliente);
      return $url_contentrpta;
      curl_close($cnxCliente);
    }

    function peticion_get($user){
     // function peticion_get(){

      $cnxCliente = curl_init();
      if(empty($user)){
        $urlPost='http://localhost/hola2/api.php';
      }else{
        $urlPost='http://localhost/hola2/api.php?name='.$user;
      }

      curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
      curl_setopt($cnxCliente, CURLOPT_HTTPGET, true);
      curl_setopt($cnxCliente, CURLOPT_RETURNTRANSFER, true); 
      $url_contentrpta = curl_exec($cnxCliente);
      return $url_contentrpta;
      if(curl_errno($cnxCliente)) echo curl_error($cnxCliente);
      curl_close($cnxCliente);
    }
    function peticion_put($name,$username, $password, $roles){
      $urlPost='http://localhost/hola2/api.php';
      $cnxCliente = curl_init();
      curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
      $datosEnvio = array();
      $datosEnvio['name'] = $name;
      $datosEnvio['username'] = $username;
      $datosEnvio['password'] = $password;
      $datosEnvio['roles'] = $roles;
      $datosEnviop = json_encode($datosEnvio);
      curl_setopt($cnxCliente, CURLOPT_HTTPGET, false);
      curl_setopt($cnxCliente, CURLOPT_POSTFIELDS, $datosEnviop);
      curl_setopt($cnxCliente, CURLOPT_RETURNTRANSFER, true); 
      $url_contentrpta = curl_exec($cnxCliente);
      return $url_contentrpta;
      curl_close($cnxCliente);
    }
    function peticion_delete($name){
      $urlPost='http://localhost/hola2/api.php';
      $cnxCliente = curl_init();
      curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
      $datosEnvio = array();
      $datosEnvio['name'] = $name;
      $datosEnviop = json_encode($datosEnvio);
      curl_setopt($cnxCliente, CURLOPT_HTTPGET, false);
      curl_setopt($cnxCliente, CURLOPT_POSTFIELDS, $datosEnviop);
      curl_setopt($cnxCliente, CURLOPT_RETURNTRANSFER, true); 
      $url_contentrpta = curl_exec($cnxCliente);
      return $url_contentrpta;
      curl_close($cnxCliente);
    }


   
 ?>