<?php
## recogemos los datos con POST, y solo permitimos POST
if ($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "ERROR: No se han recibido datos del formulario";

    print "<p><a href='index.php'>Volver al formulario</a></p>";
}
else{
    if(isset($_POST['nombre']) && ($_POST["nombre"]!="")){
        $nombre = $_POST['nombre'];
    }else{
        $nombreError = "No se ha recibido el nombre";
    }

     if(isset($_POST['edad']) && ($_POST["edad"]!="")){
        if (is_numeric($_POST['edad'])){
            if(($_POST['edad']<0) || ($_POST['edad']>150)){
                $edadError = "La edad debe estar entre 0 y 150";
            }
            else{
                $edad = $_POST['edad'];
            }
        }else{
             $edadError = "La edad debe ser un valor numérico";
        }
    }else{
        $edadError = "No se ha recibido la edad";
    }

    if (isset($nombre)){
        echo "<br>Nombre: $nombre <br>";
    }else{
        echo "<br>ERROR: $nombreError <br>";
    }

    if (isset($edad)){
        echo "<br>Edad: $edad <br>";
    }else{
        echo "<br>ERROR: $edadError <br>";
    }

    print "<p><a href='index.php'>Volver al formulario</a></p>";

}
?>