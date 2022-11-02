<?php

include_once '../model/productos_model.php';

$producto  = new productos_model();

$response = array();

$id = filter_input(INPUT_GET, "id");


if ($id!=null) {
    $producto ->setId($id) ;
   
    $response['borrarProductoList'] = $producto->delete();//call to the model
    
}
else{
    $response['borrarProductoList']="Ez de id pasatu/No se ha pasado id";
}

echo json_encode($response);


?>