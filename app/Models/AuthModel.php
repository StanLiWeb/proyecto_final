<?php

session_start();

function iniciarSesion($parametro)
{
    include '../../config/conexion.php';
    $username = $parametro['username'];
    $password = md5($parametro['password']);
    $consulta = "SELECT username, password FROM users 
    WHERE username ='$username' AND password ='$password'";
    $ejecutar = $conexion->query($consulta);

    if($ejecutar->num_rows > 0)
    {
        echo 'SI';
        $_SESSION['cliente'] = $username;
    }
    else
    {
        echo 'NO';
    }
}

// Función para registrar un nuevo usuario
function registrarUsuario($parametro)
{
    include '../../config/conexion.php';
    $username = $parametro['username'];
    $password = md5($parametro['password']);
    //VALIDAR SI EXSITE
    $consulta_validar = "SELECT username, password FROM users 
        WHERE username ='$username' AND password ='$password'";
        $ejecutar = $conexion->query($consulta_validar);
    
        if($ejecutar->num_rows > 0)
        {
            echo 'Existe';
        }
        else
        {       
        $consulta = "INSERT INTO users (username,password) VALUES ('$username','$password')"; 
        $ejecutar2 = $conexion->query($consulta);
        echo 'No Existe';
        }
}

// Función para cerrar sesión
function cerrarSesion()
{
    // Destruir la sesión
    session_destroy();
    echo 'SI';  // Sesión cerrada exitosamente
}

?>
