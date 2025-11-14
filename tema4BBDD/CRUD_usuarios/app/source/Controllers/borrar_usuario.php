<?php
session_start();
require_once __DIR__ . '/../Models/BaseDatos.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
else
{
    $id = $_POST["id"];
    $dbInstancia = BaseDatos::getInstance();
    $dbInstancia->borrar_usuario($id);
    header("Location: ../Views/listado.php");
    die;
}