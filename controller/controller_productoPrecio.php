<?php 
include_once '../model/productos_model.php';
$precio = filter_input(INPUT_GET, "precio");

$listprecio  = new productos_model();

$list=array();
$list=$listprecio->setList();
$listaFiltrada=array();
$listaFiltrada2=array();
if(isset($precio)){
    for ($i=0; $i < count($list); $i++) { 
        if( $list[$i]->precio<=$precio){
            array_push($listaFiltrada,$list[$i]);  
        }
        
    } 
    
}else{
    $listaFiltrada=  $list;
}

$response = array();

$response['productosPrecio']=$listaFiltrada;
$response['error'] = "no error";

echo json_encode($response);

unset($listprecio);
unset($list);
