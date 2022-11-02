<?php

include_once '../model/productos_model.php';

$producto  = new productos_model();

$titulo = filter_input(INPUT_GET, "titulo");
$stock = filter_input(INPUT_GET, "stock");
$precio = filter_input(INPUT_GET, "precio");
$foto = filter_input(INPUT_GET, "foto");
$valoracion = filter_input(INPUT_GET, "valoracion");
$descripcion = filter_input(INPUT_GET, "descripcion");
$TipoProducto = filter_input(INPUT_GET, "TipoProducto");



if($titulo != null){
    $producto->setTitulo($titulo);
}
if($stock != null){
    $producto->setStock($stock);
}
if($precio != null){
    $producto->setPrecio($precio);
}
if($foto != null){
    $producto->setFoto($foto);
}
if($valoracion != null){
    $producto->setValoracion($valoracion);
}
if($descripcion != null){
    $producto->setDescripcion($descripcion);
}
if($TipoProducto != null){
    $producto->setTipoProducto($TipoProducto);
}



$response = array();
$response['error'] = $producto->insert();//call to the model

echo json_encode($response);


?>