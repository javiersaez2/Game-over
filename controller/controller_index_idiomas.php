<?php 
include_once '../model/idiomas_model.php';

$idiomas  = new idiomas_model();

$list=array();
$list=$idiomas->setList();

$response = array();
$response['idiomasList']=$list;
$response['error'] = "no error";

echo json_encode($response);

unset($idiomas);
unset($list);
?>