<?php 
include_once '../model/productos_model.php';

$productos  = new productos_model();

$list=array();
$list=$productos->setList();

$response = array();
$response['productosList']=$list;
$response['error'] = "no error";

echo json_encode($response);

unset($productos);
unset($list);
?>