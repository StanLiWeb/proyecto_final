<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-[url(/public/fondoaut.jpg)] bg-cover ">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-4">Bienvenido</h2>
        <p class="text-gray-500 text-center mb-6">Ingresa tus credenciales para continuar</p>
        <form id="loginForm" class="space-y-4">
            <input 
                type="text" 
                id="username" 
                name="username" 
                placeholder="Correo Electrónico" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Contraseña" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <input 
                type="submit" 
                value="Iniciar Sesión" 
                class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </form>
        <div id="mensaje_error" class="mt-4 text-red-500 text-sm"></div>
        <div class="mt-6 text-center space-y-2">
            <a 
                href="password.html" 
                class="text-blue-500 hover:underline block"
            >
                ¿Olvidaste tu contraseña?
            </a>
            <a 
                href="register.php" 
                class="text-blue-500 hover:underline block"
            >
                ¿Deseas crear un nuevo usuario?
            </a>
        </div>
    </div>
</body>


</html>
<script>
    document.getElementById('loginForm').onsubmit = function(event) {
        event.preventDefault(); // Evita el envío del formulario y recarga de la página

        // Obtener valores de los campos
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        if (username == '') {
            document.getElementById('mensaje_error').innerHTML = '<center>Ingrese el username</center>';
        }
        if (password == '') {
            document.getElementById('mensaje_error').innerHTML = '<center>Ingrese la contrase\u00F1a</center>';
        }

        //alert("username: " + username + " - Contraseña: " + password);
        var parametros = {
            iniciarSesion: 1,
            username: username,
            password: password
        };

        alert(parametros.username);

        $.ajax({
            url: "../../../app/Controllers/AuthController.php",
            type: "POST",
            data: parametros,
            dataType: "html",
            success: function(datos) {
                if (datos == 'SI') {
                    window.location.href = "../dashboard/index.php";
                } else {
                    console.log('error');
                }
            }
        });

    };
</script>