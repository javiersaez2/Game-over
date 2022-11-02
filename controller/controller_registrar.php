<?php

include_once '../model/login_model.php';

$usuario  = new login_model();

$nombre = filter_input(INPUT_GET, "username");
$password = filter_input(INPUT_GET, "password");




if($nombre != null ){
    $usuario->setNombre($nombre);
}
if($password != null){
    $usuario->setContrasena(md5($password));
}




$response = array();
$response['listeUsuarios'] = $usuario->registrar();//call to the model

echo json_encode($response);


?>