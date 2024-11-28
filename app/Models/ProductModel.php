<?php

session_start();

function CargarProductos($parametro)
{
    include '../../config/conexion.php';
    
    // Consulta SQL para cargar los productos
    $consulta = "SELECT id, description, date, status, purchase_p, sale_p, stock FROM products";
    
    // Inicializar el array donde se guardarán los productos
    $array_productos = array();
    
    // Preparar y ejecutar la consulta
    if ($stmt = $conexion->prepare($consulta)) {
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $resultado = $stmt->get_result();
        
        // Recorrer los resultados y agregar los productos al array
        while ($recorre = $resultado->fetch_assoc()) {
            $array_productos[] = $recorre;
        }
        
        // Cerrar la sentencia
        $stmt->close();
        
        // Devolver los productos como JSON
        echo json_encode($array_productos);
    } else {
        echo "Error al preparar la consulta.";
    }
}
?>
