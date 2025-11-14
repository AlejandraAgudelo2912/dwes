<?php
session_start();
require_once "includes/funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = recoge("nombre");
    $edad = recoge("edad");
    $aficiones = isset($_POST["aficiones"]) ? $_POST["aficiones"] : [];
    $sexo = recoge("sexo");

    $OK = true;

    if ($nombre == null) {
        $OK = false;
        $_SESSION["errores"]["nombre"] = "Falta el nombre";
    }

    if ($edad == null) {

        $OK = false;
        $_SESSION["errores"]["edad"] = "Falta la edad";

    } elseif (!is_numeric($edad)) {

        $OK = false;
        $_SESSION["errores"]["edad"] = "La edad debe ser un número";

    } elseif ($edad < 0 || $edad > 120) {

        $OK = false;
        $_SESSION["errores"]["edad"] = "La edad debe estar entre 0 y 120";
    }

    if ($sexo == null) {
        $OK = false;
        $_SESSION["errores"]["sexo"] = "Falta el sexo";
    }


    if ($OK) {
        $_SESSION["nombre"] = $nombre;
        $_SESSION["edad"] = $edad;
        $_SESSION["sexo"] = $sexo;
        $_SESSION["aficiones"] = $aficiones;

        header("Location: mostrardatos.php");
        die;

    } else {
        $_SESSION["nombre"] = $nombre;
        $_SESSION["edad"] = $edad;
        $_SESSION["sexo"] = $sexo;
        $_SESSION["aficiones"] = $aficiones;
        header("Location: index.php");
        die;
    }


}else {
    header("Location: index.php");
    die;
}




