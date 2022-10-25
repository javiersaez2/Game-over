<?php 
include_once '../model/tipoProducto_model.php';

$tipoProducto  = new tipoProducto_model();

$list=array();
$list=$tipoProducto->setList();

$response = array();
$response['listTipoProductos']=$list;
$response['error'] = "no error";

echo json_encode($response);

unset($tipoProducto);
unset($list);
?>