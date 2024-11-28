<?php

session_start();


include './head.php';
?>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 p-6 text-white">
        <?php include './components/sidebar.php'; ?>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col overflow-hidden p-2">
      

        <!-- Content -->
        <div class="flex-1 overflow-y-auto">
              <!-- Header -->
        <header class="bg-gray-800 text-white shadow-md p-4 mb-6">
            <?php include './components/header.php'; ?>
        </header>
            <!-- Stats -->
            <section class="mb-6">
                <?php include './components/stats.php'; ?>
            </section>

            <!-- Timeline -->
            <section class="mb-6">
                <?php include './components/timeline.php'; ?>
            </section>

            <!-- Product Form -->
            <section class="mb-6 bg-gray-900 p-6 rounded-lg shadow-md text-white">
                <?php include './components/product-form.php'; ?>
            </section>

            <!-- Products Table -->
            <section class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <?php include './components/table-products.php'; ?>
            </section>

            <!-- Recent Activity -->
            <section class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <?php include './components/recent-activity.php'; ?>
            </section>
        </div>
    </main>
</body>


</html>
<script>
    $(document).ready(
        function() {
            CargarProductos();
        }
    );


    function CerrarSesion() {
        var parametros = {
            cerrarSesion: 1
        };

        $.ajax({
            url: "../../../app/Controllers/AuthController.php",
            type: "POST",
            data: parametros,
            dataType: "html",
            success: function(datos) {
                if (datos == 'SI') {
                    window.location.href = "../auth/login.php";
                } else {
                    console.log('error');
                }
            }
        });
    }

    function CargarProductos() {
        var parametros = {
            CargarProductos: 1
        };

        $.ajax({
            url: "../../../app/Controllers/ProductController.php",
            type: "POST",
            data: parametros,
            dataType: "html",
            success: function(datos) {
                document.getElementById('ejemplo').innerHTML = datos;
            }
        });
    }

    $(document).ready(function() {
        var tabla = $('#example').DataTable({
            "ajax": {
                "url": '../../../app/Controllers/ProductController.php',
                "method": 'GET',
                "data": {
                    "CargarProductos": 1
                },
                "dataSrc": ""
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "description"
                },
                {
                    "data": "status"
                },
                {
                    "data": "purchase_p"
                },
                {
                    "data": "sale_p"
                },
                {
                    "data": "stock"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                        <button class="btn-edit" data-id="${row.id}" data-description="${row.descripcion}">Editar</button>
                        <button class="btn-delete" data-id="${row.id}">Eliminar</button>
                    `;
                    }
                }
            ],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    text: 'A excel',
                    title: 'Lista de Productos'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'A pdf',
                    title: 'Lista de Productos'
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    title: 'Lista de Productos'
                },
            ]
        });

        // Capturar el evento submit del formulario
        $('#product-form').on('submit', function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

            // Capturar los valores de los campos del formulario
            var purchase_p = $('#purchase_p').val();
            var sale_p = $('#sale_p').val();
            var stock = $('#stock').val();
            var status = $('#status').val();
            var description = $('#description').val();

            // Crear una nueva fila con los datos del formulario
            var newRow = [
                "", // El ID puede estar vacío ya que lo asignarás en el servidor o será generado automáticamente
                description,
                status,
                sale_p,
                purchase_p, // Puedes cambiar este campo según corresponda (pventa o pcompra)
                stock,
                "" // La columna de acciones
            ];

            // Agregar la nueva fila a la tabla
            tabla.row.add(newRow).draw();

            // Limpiar el formulario
            $('#product-form')[0].reset();
        });

        // Eventos de los botones Editar y Eliminar
        $('#example').on('click', '.btn-edit', function() {
            const productId = $(this).data('id');
            const description = $(this).data('description');

            // Lógica para editar el producto (puedes abrir un modal o hacer algo con la información)
            alert('Editando producto con ID: ' + productId + ' y descripción: ' + description);
        });

        $('#example').on('click', '.btn-delete', function() {
            const productId = $(this).data('id');

            // Confirmación de eliminación
            if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                // Lógica para eliminar el producto (en este caso, solo lo removemos de la tabla)
                alert('Producto con ID ' + productId + ' eliminado');

                // Aquí puedes hacer la lógica para eliminar la fila si lo deseas
                var row = $(this).closest('tr');
                tabla.row(row).remove().draw();
            }
        });
    });
</script>