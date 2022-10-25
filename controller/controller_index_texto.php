<?php 
include_once '../model/textos_model.php';

$textos  = new textos_model();

$list=array();
$list=$textos->setList();

$response = array();
$response['TextosList']=$list;
$response['error'] = "no error";

echo json_encode($response);

unset($textos);
unset($list);
?>