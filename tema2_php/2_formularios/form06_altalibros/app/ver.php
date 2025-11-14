<?php
require_once("includes/funciones.php");
require_once("models/book.php");

if (isset($_GET['title'])) {
    $titulo = $_GET['title'];
} else {
    echo "<h2>No se ha especificado ningún libro.</h2>";
    exit;
}


$listaLibros = obtener();

$libroEncontrado = null;

foreach ($listaLibros as $libro) {
    if ($libro->title === $titulo) {
        $libroEncontrado = $libro;
        break;
    }
}

if (!$libroEncontrado) {
    echo "<h2>No se encontró el libro '$titulo'.</h2>";
    exit;
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
        <h1><?php echo $titulo ?></h1>
    </header>
    <main>
       <?php echo "<label>Author: ".$libro->author."</label><br>" ?>
       <?php echo "<label>Año: ".$libro->year."</label><br>" ?>
        <?php
       foreach ($libro->genre as $genero) {
            echo "<label>$genero</label><br>";
        }
        ?>

     <?php echo "<img src='".$libro->caratula."'>" ?>
     <a href="listado.php"> volver al listado</a>

    </main>
</body>
</html>