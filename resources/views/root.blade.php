<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
</head>
<body>
    <a href="/salir" style="width=100px">Salir para no crashear el app pls!</a>
    <h1>Insertar un producto</h1>

    <form action="/catalogo" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria"><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="disponible">Disponible:</label>
        <select id="disponible" name="disponible" required>
            <option value="1" selected>Sí</option>
            <option value="0">No</option>
        </select><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen"><br><br>

        <button type="submit">Guardar Producto</button>
    </form>
</body>
</html>
