<?php 
include_once '../model/productos_model.php';
$IdTipo = filter_input(INPUT_GET, "idTipo");

$productosId  = new productos_model();

$list=array();
$list=$productosId->setListId();
$listaFiltrada=array();
if(isset($IdTipo)){
    for ($i=0; $i < count($list); $i++) { 
        if( $list[$i]->idTipo==$IdTipo ){
            array_push($listaFiltrada,$list[$i]);  
        }
    } 
    
}else{
    $listaFiltrada=  $list;
}

$response = array();

$response['productosListId']=$listaFiltrada;
$response['error'] = "no error";

echo json_encode($response);

unset($productosId);
unset($list);
