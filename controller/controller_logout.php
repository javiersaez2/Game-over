<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['nombreUser']);
unset($_SESSION['contrasenaUser']);
unset($_SESSION['permisos']);
session_destroy();
echo json_encode(true);
?>