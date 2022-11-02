<?php 
include_once '../model/login_model.php';
$nombre = filter_input(INPUT_GET, "username");
$contrasena = filter_input(INPUT_GET, "password");

$login  = new login_model();

if (isset($nombre) && isset($contrasena)) {
   $login->setContrasena(md5($contrasena));
   $login->setNombre($nombre);

   $list=array();
   $list=$login->setList();

}


$response = array();
$response['loginList']=$list;
$response['error'] = "no error";

echo json_encode($response);

unset($login);
unset($list);
?>