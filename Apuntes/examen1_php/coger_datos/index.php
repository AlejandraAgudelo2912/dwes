<?php
    session_start();
    require_once "recoger_datos.php";
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset ="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recambios de coche</title>
    </head>
    <body>
        <?php include "views/menu.php"; ?>

        <?php

            if (!isset($_SESSION['usuario'])){
                header("Location: login.php");
                die;
            }
        ?>

        <h3>Seleccione el coche para ver los recambios disponibles:</h3>
        <form action="mostrar.php" method="post">
            <?php
                $marcas=filtrar_por_marca();
                echo "<select name='marca'>";
                foreach($marcas as $marca){
                    echo "<option value='".$marca."'>$marca</option>";
                }
                echo "</select>";

            ?>

            <input type="submit" value="Ver recambios disponibles">
        </form>


    </body>
</html>