<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    die;
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
        <h1>BIENVENIDO, <?php echo $_SESSION['usuario']?></h1>
    </header>
    <main>
       <label> Nombre de usuario: </label><?php echo $_SESSION['usuario']?><br><br>
       <a href='logout.php'>Cerrar sesión</a><br><br>
       <a href='listado.php'>Volver al listado</a>
    </main>
</body>
</html>