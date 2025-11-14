<?php
require_once "recoger_datos.php";

if ($_SERVER["REQUEST_METHOD"]!="POST"){
    header("Location: index.php");
    die;
}
// echo "<pre>";
// print_r($_POST);
$marca_seleccionada=$_POST["marca"] ?? null;

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset ="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recambios de coche</title>
    </head>
    <body>
        <h1>Recambios de coche</h1>
        <h3>Recambios disponibles para la marca: <?php echo htmlspecialchars($marca_seleccionada); ?></h3>
        <?php
            if(isset($marca_seleccionada)){
                $json=recogerDatos();

                foreach($json["coches"] as $coche){
                    if($coche["marca"]==$marca_seleccionada){
                        echo $coche["modelo"];
                        echo $coche["anio"];
                        echo "<ul>";
                        foreach($coche["recambios"] as $recambio){
                            echo "<li>".$recambio["nombre"]." - ".$recambio["precio"]." EUR</li>";
                            if($recambio["disponibilidad"]){
                                echo " (Disponible)";
                            }else{
                                echo " (No disponible)";
                            }
                        }
                    }
                }

            }else{
                echo "<p>No se ha seleccionado ninguna marca.</p>";
            }
        ?>
        

    </body>
</html>