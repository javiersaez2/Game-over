<?php
include_once '../model/productos_model.php';

$producto  = new productos_model();
$id = $_GET['id'];

$list=array();
$list=$producto->getProduct($id);

$response = array();
$response['producto']=$list;
$response['error'] = "no error";

echo json_encode($response);

unset($producto);
unset($list);

?>