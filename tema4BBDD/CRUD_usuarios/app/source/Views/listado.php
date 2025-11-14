<?php
session_start();
require_once '../Models/BaseDatos.php';
require_once '../Models/usuario.php';

$dbInstancia = BaseDatos::getInstance();
$sql="SELECT * FROM usuarios";
$sentencia = $dbInstancia->get_data($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <?php include_once __DIR__ . '/../Views/menu.php'; ?>
    <h2>Listado de Usuarios</h2>

    <table border="1" class="tabla" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Fecha_Nac</th>
                <th>Edad</th>
                <th>Accion</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($registroPDO = $sentencia->fetch(PDO::FETCH_OBJ)):
            $usuario = new Usuario(
                $registroPDO->id,
                $registroPDO->nombre,
                $registroPDO->apellidos,
                $registroPDO->usuario,
                $registroPDO->password,
                new DateTime($registroPDO->fecha_nac));
            ?>
            <tr>
                <td><?= $usuario->nombre ?></td>
                <td><?= $usuario->apellidos ?></td>
                <td><?= $usuario->usuario ?></td>
                <td><?= $usuario->fecha_nac->format('d/m/Y') ?></td>
                <td><?= $usuario->getEdad() ?></td>

                <td>
                    <a href=ver.php?id=<?= $usuario->id ?>><button>Ver</button></a>
                    <form action="../Controllers/borrar_usuario.php" method="post" >
                        <input type="hidden" name="id" value="<?= $usuario->id ?>">
                        <button type="submit" >Borrar</button>
                    </form>

                    <form action="../Views/actualizar.php" method="get" >
                        <input type="hidden" name="id" value="<?= $usuario->id ?>">
                        <button type="submit" >Actualizzar</button>
                    </form>
                </td>

            </tr>
            <?php endwhile; ?>

</body>
</html>