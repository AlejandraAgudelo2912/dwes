<?php

require_once "funciones.php";

$conexion = conectaDb();

$nombre = "pepe";
$apellidos="conejo";

try {

    $consulta_borrado = "DELETE FROM Personas WHERE nombre = :nombre AND apellidos = :apellidos";
    $sentencia = $conexion->prepare($consulta_borrado);
    $sentencia -> bindParam(":nombre",$nombre);
    $sentencia -> bindParam(":apellidos",$apellidos);
    $sentencia -> execute();

    
} catch (PDOException $e) {
    echo "Error al borrar la persona:".$nombre." ".$apellidos."<br>";
    echo  $e->getMessage();
    die;
}

print "<h2>Borrado de persona</h2>";
print "<p>Personas borradas con nombre: {$nombre} y apellidos: {$apellidos}</p>";
print "<p>Total de personas borradas: " . $sentencia->rowCount() . "</p>";

$pdo = null;