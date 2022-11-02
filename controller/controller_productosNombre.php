<?php 
include_once '../model/productos_model.php';
$nombre = filter_input(INPUT_GET, "nombre");

$listnombre  = new productos_model();

$list=array();
$list=$listnombre->setList();
$listaFiltrada=array();
if(isset($nombre)){
    for ($i=0; $i < count($list); $i++) { 
        if(strlen(strstr($list[$i]->titulo,$nombre))>0){
            array_push($listaFiltrada,$list[$i]);  
        }
        
    } 
    
}else{
    $listaFiltrada=  $list;
}

$response = array();
$response['productos']=$list;
$response['productosNombre']=$listaFiltrada;
$response['error'] = "no error";

echo json_encode($response);

unset($listnombre);
unset($list);
