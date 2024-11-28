<div class="">
            <h3 class="text-2xl font-bold mb-4">Agregar nuevo producto</h3>
            <form id="product-form" class="grid grid-cols-4 gap-4">
                <!-- Nombre -->
                <div class="col-span-2">
                    <label for="nombre" class="block">Nombre:</label>
                    <input class="w-full p-2 rounded-lg bg-gray-900 border border-gray-700" type="text" id="nombre" name="nombre" required>
                </div>

                <!-- Precio -->
                <div class="col-span-2">
                    <label for="precio" class="block">Precio:</label>
                    <input class="w-full p-2 rounded-lg bg-gray-900 border border-gray-700" type="number" id="precio" name="precio" required>
                </div>

                <!-- Estado -->
                <div class="col-span-2">
                    <label for="estado" class="block">Estado:</label>
                    <select class="w-full p-2 rounded-lg bg-gray-900 border border-gray-700" id="estado" name="estado" required>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>

                <!-- Stock -->
                <div class="col-span-2">
                    <label for="stock" class="block">Stock:</label>
                    <input class="w-full p-2 rounded-lg bg-gray-900 border border-gray-700" type="number" id="stock" name="stock" required>
                </div>

                <!-- Descripción -->
                <div class="col-span-4">
                    <label for="descripcion" class="block">Descripción:</label>
                    <textarea class="w-full p-2 border-2 border-gray-700 rounded-lg bg-gray-900" id="descripcion" name="descripcion" required></textarea>
                </div>

                <!-- Botón Enviar -->
                <div class="col-span-4 flex justify-center">
                    <input class="px-4 py-2 bg-blue-500 text-white rounded-lg cursor-pointer hover:bg-blue-600" type="submit" value="Enviar">
                </div>
            </form>
        </div>