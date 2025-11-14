<?php
session_start();
require_once __DIR__ . "/../source/Models/basedatos.php";

//Nos conectamos a la base de datos
$dbInstancia = Basedatos::getInstance(); //singleton

if ($dbInstancia->getConnection()!=null){
    //Hemos conectado bien. 
    $_SESSION["conectado"]=true;
    header ("Location: ../source/Views/listado.php");
}else{
    echo "ERROR en la conexion a la base de datos.";
    die;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuarios - Inicio</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
</body>
</html>    