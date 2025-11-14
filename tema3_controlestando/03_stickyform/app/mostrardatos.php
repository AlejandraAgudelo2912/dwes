<?php

session_start();
require_once "includes/funciones.php";

if (isset($_SESSION["nombre"]) && isset($_SESSION["edad"]) && isset($_SESSION["sexo"])) {
    $nombre = $_SESSION["nombre"];
    $edad = $_SESSION["edad"];
    $sexo = $_SESSION["sexo"];

    if(isset($_SESSION["aficiones"])) {
        $aficiones = $_SESSION["aficiones"];
    }

    unset($_SESSION["nombre"]);
    unset($_SESSION["edad"]);
    unset($_SESSION["sexo"]);
    unset($_SESSION["aficiones"]);
} else {
    header("Location: index.php");
    die;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>03_stickyform</title>
</head>
<body class="body-tipo2">
    <header>
        <h1>3 Sticky form</h1>
    </header>
    <main>
        <h2>Datos recibidos</h2>
        <p>Nombre: <?php echo $nombre; ?></p>
        <p>Edad: <?php echo $edad; ?></p>
        <p>Sexo: <?php echo $sexo; ?></p>
        <p>Aficiones: 
            <?php 
            if (isset($aficiones) && count($aficiones) > 0) {
                echo implode(", ", $aficiones);
            } else {
                echo "No se han seleccionado aficiones.";
            }
            ?>
    </main>
    <a href="index.php">Volver al formulario</a>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
    </footer>
</body>
</html>