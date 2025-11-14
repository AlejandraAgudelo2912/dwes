<?php
session_start();
if (!isset ($_SESSION["conectado"]) || !$_SESSION["conectado"]){
    echo "<a href='../../public/index.php'>Inicio</a>";
    die;
}
require_once "../models/basedatos.php";
require_once "../models/usuario.php";
$id = $_GET["id"];
$dbInstancia = BaseDatos::getInstance();
$sql = "SELECT * FROM usuarios WHERE id = :id";
$parametros = [':id' => $id];
$sentencia = $dbInstancia->get_data($sql, $parametros);
$registroPDO = $sentencia->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuarios</title>
</head>
<body>
<?php include "menu.php" ?>
<h2>Actualizar usuario</h1>
<form action="../controllers/actualizar-usuario.php" method="POST">
    <input type="hidden" name="id" value="<?= $registroPDO->id ?>">
    <p>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= $registroPDO->nombre ?>">
    </p>
    <p>
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?= $registroPDO->apellidos ?>">
    </p>
    <p>
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" value="<?= $registroPDO->usuario ?>">
    </p>
    <p>
    <label for="password">Password (1234 por defecto):</label>
    <input type="password" id="password" name="password" value="<?= $registroPDO->password ?>">
    </p>
    <p>
    <label for="fecha_nac">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= $registroPDO->fecha_nac ?>">
    </p>
    <button type=submit>Actualizar usuario</button>
</form>

</body>
</html>