<?php
include '../Models/AuthModel.php';

if(isset($_POST['iniciarSesion'])) {
  
    $sql = iniciarSesion($_POST);
    return $sql;

}
if(isset($_POST['registrarUsuario'])) {
  
    $sql = registrarUsuario($_POST);
    return $sql;

}
if(isset($_POST['cerrarSesion'])) {
  
    $sql = cerrarSesion($_POST);
    return $sql;

}
?>