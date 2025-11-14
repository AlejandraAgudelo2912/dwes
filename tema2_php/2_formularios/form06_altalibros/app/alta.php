<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de libro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Alta de libro</h1>
    </header>
    <main>
        <form action="procesar_alta.php" method="post" enctype="multipart/form-data">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" required><br>

            <label for="author">Autor:</label>
            <input type="text" name="author" id="author" required><br>

            <label for="year">Año:</label>
            <input type="number" name="year" id="year" required><br>

            <label for="caratula">Carátula (opcional):</label>
            <input type="file" name="caratula" id="caratula" accept="image/*"><br>

            <label for="genre">Género:</label>

            <input type="checkbox" name="genre[]" value="romance">Romance
            <input type="checkbox" name="genre[]" value="ciencia-ficcion">Ciencia-ficción
            <input type="checkbox" name="genre[]" value="policiaco">Policiaco
            <input type="checkbox" name="genre[]" value="terror">Terror
            <input type="checkbox" name="genre[]" value="histórico">Histórico
            <input type="checkbox" name="genre[]" value="fantasia">Fantasía

            <br>
            <p class="error">
            <?php
                if (isset($_GET['mensaje'])) {
                    echo ($_GET['mensaje']);
                }
            ?>
            </p>

            <input type="submit" value="Guardar libro">
        </form>
        <p><a href="index.php">Volver a la lista</a></p>
    </main>
</body>
</html>