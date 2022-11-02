<?php
include_once '../model/productos_model.php';

$producto  = new productos_model();

$response = array();

$id = filter_input(INPUT_GET, "id");
$producto->getProduct($id);


$response['producto'] = $producto;

echo json_encode($response);

unset($response);
unset($producto);
unset($id);
?>