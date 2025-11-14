<?php

require_once "funciones.php";
$conexion = conectaDb();

$nombre = "pepe";
$apellidos="conejo";
$edad = 30;


try{

    $consulta_insercion = "INSERT INTO Personas (nombre, apellidos, edad) VALUES (:nombre, :apellidos, :edad)";
    $sentencia = $conexion->prepare($consulta_insercion);
    $sentencia -> bindParam(":nombre",$nombre);
    $sentencia -> bindParam(":apellidos",$apellidos);
    $sentencia -> bindParam(":edad",$edad);
    $sentencia -> execute();

}catch(PDOException $e){
    echo "Error al insertar la persona:".$nombre." ".$apellidos."<br>";
    echo  $e->getMessage();
    die;
}

print "<h2>Inserccion de persona</h2>";
print "<p>Persona insertada con id: " . $conexion->lastInsertId() . "</p>";
print "<p>Nombre: {$nombre}</p>";
print "<p>Apellidos: {$apellidos}</p>";
print "<p>Edad: {$edad}</p>";


$pdo = null;