<?php
include "config.php";
include "utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['name']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM user where name=:name");
      $sql->bindValue(':name', $_GET['name']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM user");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

// Crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // cuando viene en el link ...api.php de afuera

  //viene de la funcion interna
  $input = file_get_contents('php://input');
  $input = json_decode($input, true);

  if (isset($input)){}else{ $input = $_POST;}

    $sql = "INSERT INTO user
          (name, username, password, roles)
          VALUES
          (:name, :username, md5(:password), :roles)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      unset($_POST);
      unset($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
  if (isset($_GET['name'])){
  $name = $_GET['name']; // cuando viene en el link ...api.php?name=User5
  }else{
  // cuando se envía con un arreglo desde la función y tambien funciona desde postman body, raw {"name":"User2"}
  $input = file_get_contents('php://input');
  $data = json_decode($input, true);
  $name = $data['name'];
  }

  $statement = $dbConn->prepare("DELETE FROM user where name=:name");
  $statement->bindValue(':name', $name);
  $statement->execute();
	header("HTTP/1.1 200 OK");
  unset($_GET);
  unset($input);
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = file_get_contents('php://input');
    if (isset($input)){}else{ $input = $_GET;}

    $data = json_decode($input, true);
    $data['password']=md5($data['password']);
    $postId = $data['name'];
    $fields = getParams($data);

    $sql = "
          UPDATE user
          SET $fields
          WHERE name='$postId'
           ";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $data);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>