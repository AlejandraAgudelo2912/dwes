<?php
session_start();
require_once("includes/funciones.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    die;
}

echo "<h1>Bienvenido, " . $_SESSION['usuario'] . "</h1>";
echo "<a href='logout.php'>Cerrar sesión</a><br>";
echo "<a href='showProfile.php'>Ver perfil</a>";

if (isset($_SESSION["libros"])) {
    $listaLibros = $_SESSION["libros"];
} else {
    $listaLibros = obtener();
    $_SESSION["libros"] = $listaLibros;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Form06</title>
</head>

<body>
    <header>
        <h1>LISTA DE LIBROS</h1>
    </header>
    <main>
        <p><a href="alta.php">Añadir nuevo libro</a></p>
        <hr>
        <?php include("tabla_libros.php"); ?>
        
    </main>
</body>
</html>