<?php

	function peticion_post($name, $password){
	$cont='';
		$urlPost='http://localhost/hola/api.php';
		//$cnxCliente = curl_init($urlPost);
		$cnxCliente = curl_init();
		curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
		$datosEnvio = array();
		$datosEnvio['name'] = $name;
		$datosEnvio['password'] = $password;
		$datosEnviop = json_encode($datosEnvio);
		curl_setopt($cnxCliente, CURLOPT_POST, true);
		curl_setopt($cnxCliente, CURLOPT_POSTFIELDS, $datosEnviop);
		curl_setopt($cnxCliente, CURLOPT_RETURNTRANSFER, true); 
		$url_contentrpta = curl_exec($cnxCliente);
		return $url_contentrpta;
		curl_close($cnxCliente);
	}

	function peticion_get($name, $password ){
		$urlPost='http://localhost/hola/api.php';
		$cnxCliente = curl_init();
		curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
		$datosEnvio = array();
		$datosEnvio['name'] = $name;
		$datosEnvio['password'] = $password;
		$datosEnviop = json_encode($datosEnvio);
		curl_setopt($cnxCliente, CURLOPT_HTTPGET, true);
		curl_setopt($cnxCliente, CURLOPT_POSTFIELDS, $datosEnviop);
		curl_setopt($cnxCliente, CURLOPT_RETURNTRANSFER, true); 
		$url_contentrpta = curl_exec($cnxCliente);
		return $url_contentrpta;
		curl_close($cnxCliente);
	}

	function peticion_put($name, $password, $roles){
		$urlPost='http://localhost/hola/api.php';
		$cnxCliente = curl_init();
		curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
		$datosEnvio = array();
		$datosEnvio['name'] = $name;
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
	function peticion_delete($name, $password, $roles){
		$urlPost='http://localhost/hola/api.php';
		$cnxCliente = curl_init();
		curl_setopt($cnxCliente, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($cnxCliente, CURLOPT_URL, $urlPost);
		$datosEnvio = array();
		$datosEnvio['name'] = $name;
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
?>