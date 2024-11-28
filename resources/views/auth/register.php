<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-[url(/public/fondoaut.jpg)] bg-cover ">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-4">Bienvenido</h2>
        <p class="text-gray-500 text-center mb-6">Formulario de Registro</p>
        <form id="registerForm" class="space-y-4">
            <input 
                type="text" 
                id="username" 
                name="username" 
                placeholder="Correo Electrónico" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Contraseña" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <input 
                type="password" 
                id="password2" 
                name="password2" 
                placeholder="Repetir Contraseña" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <input 
                type="submit" 
                value="Registrarse" 
                class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </form>
        <div id="mensaje_error" class="mt-4 text-red-500 text-sm"></div>
        <a 
            href="login.php" 
            class="block text-center text-blue-500 hover:underline mt-6"
        >
            Iniciar Sesión
        </a>
    </div>
</body>


</html>

<script>
    document.getElementById('registerForm').onsubmit = function(event) {
        event.preventDefault(); // Evita el envío del formulario y recarga de la página

        // Obtener valores de los campos
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        var mensajeError = document.getElementById('mensaje_error');

        // Limpiar mensaje de error anterior
        mensajeError.innerHTML = '';

        // Validación de campos
        if (username == '') {
            mensajeError.innerHTML = '<center>Ingrese el correo electrónico</center>';
            return;
        }
        if (password == '') {
            mensajeError.innerHTML = '<center>Ingrese la contraseña</center>';
            return;
        }
        if (password != password2) {
            mensajeError.innerHTML = '<center>Las contraseñas no son iguales</center>';
            return;
        }

        // Obtener la dirección IP (opcional)
        var ip = '<?php echo $_SERVER['REMOTE_ADDR']; ?>'; // Dirección IP del usuario

        // Si pasa la validación, enviar datos
        var parametros = {
            registrarUsuario: 1,
            username: username,
            password: password,
            ip: ip
        };

        $.ajax({
            url: "../../../app/Controllers/AuthController.php",
            type: "POST",
            data: parametros,
            dataType: "html",
            success: function(datos) {
                // Mostrar el mensaje de respuesta del servidor
                mensajeError.innerHTML = '<center>' + datos + '</center>';
            },
            error: function() {
                // Mostrar un mensaje de error si la solicitud falla
                mensajeError.innerHTML = '<center>Error al registrar el usuario. Inténtalo nuevamente.</center>';
            }
        });
    };
</script>
