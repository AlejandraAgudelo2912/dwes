<?php

require_once "../models/basedatos.php";
require_once "../models/usuario.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
else
{
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $usuario = $_POST["usuario"];
    $passwordClaro = $_POST["password"];
    $passwordCifrado = password_hash($passwordClaro, PASSWORD_DEFAULT);
    $fecha_nac = $_POST["fecha_nac"];
    
    
    $usuario = new Usuario (
        $id,
        $nombre,
        $apellidos,
        $usuario,
        $passwordCifrado,
        new DateTime($fecha_nac));
    $dbInstancia = BaseDatos::getInstance();
    $dbInstancia->actualizar_usuario($usuario);
    header("Location: ../Views/listado.php");
    die;
}