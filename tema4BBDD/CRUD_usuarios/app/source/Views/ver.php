<?php
session_start();
require_once __DIR__ . '/../Models/BaseDatos.php';

if (!isset($_SESSION['conectado']) || $_SESSION['conectado'] !== true) {
    header("Location: ../../public/index.php");
    exit;
}
$id = $_GET['id'];
$dbInstancia = BaseDatos::getInstance();
$sql = "SELECT * FROM usuarios WHERE id = :id";
$parametros = [':id' => $id];
$sentencia = $dbInstancia->get_data($sql, $parametros);

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuario</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <?php include_once __DIR__ . '/../Views/menu.php'; ?>
    <h2>Detalles del Usuario</h2>
    <?php if ($registroPDO = $sentencia->fetch(PDO::FETCH_OBJ)): ?>
        <p><strong>Nombre:</strong> <?= $registroPDO->nombre ?></p>
        <p><strong>Apellidos:</strong> <?= $registroPDO->apellidos ?></p>
        <p><strong>Usuario:</strong> <?= $registroPDO->usuario ?></p>
        <p><strong>Fecha de Nacimiento:</strong> <?php 
        $fechaDT = new DateTime( $registroPDO->fecha_nac);
        echo $fechaDT->format('d/m/Y');

        ?></p>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>

</body>
</html>