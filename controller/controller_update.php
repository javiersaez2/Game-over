<?php
include_once '../model/productos_model.php';

$producto = new productos_model();
$response = array();

$producto->id = $_GET['id'];
$producto->titulo = $_GET['titulo'];
$producto->stock = $_GET['stock'];
$producto->precio = $_GET['precio'];
$producto->valoracion = $_GET['valoracion'];
$producto->descripcion = $_GET['descripcion'];
$producto->idTipo = $_GET['tipo'];
$producto->foto = $_GET['foto'];

$response['response'] = $producto->update_producto();

echo json_encode($response);
unset($producto);

// include_once '../model/pelicula_model.php';

// $pelicula  = new pelicula_model();

// $response = array();

// $id = filter_input(INPUT_GET, "id");
// $titulo = filter_input(INPUT_GET, "titulo");
// $anio = filter_input(INPUT_GET, "anio");
// $director = filter_input(INPUT_GET, "director");
// $cartel = filter_input(INPUT_GET, "cartel");


// if (isset($id)) {
//     $pelicula ->setIdPelicula($id) ;
//    if($titulo != null){
//        $pelicula->setTituloPelicula($titulo);
//    }
//    if($director != null){
//        $pelicula->setDirector($director);
//    }
//    if($anio != null){
//        $pelicula->setAnio($anio);
//    }
//    if($cartel != null){
//        $pelicula->setCartel($cartel);
//    }
//    $response['error'] = $pelicula->update();//call to the model
   
// }
// else{
//     $response['error']="Ez de id pasatu/No se ha pasado id";
// }

?>