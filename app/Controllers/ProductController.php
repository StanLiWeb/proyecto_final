<?php
include '../Models/ProductModel.php';

if(isset($_GET['CargarProductos'])) {
  
    $sql = CargarProductos($_GET);
    return $sql;

}

?>