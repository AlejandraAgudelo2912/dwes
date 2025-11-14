<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: listado.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? null;
    $password = $_POST['password'] ?? null;

    if (empty($usuario) || empty($password)) {
        $mensaje = "El usuario y la contraseña no pueden estar vacíos.";
    } else {
        if ($usuario === 'admin' && $password === '1234') {
            $_SESSION["usuario"] = $usuario;
            header("Location: listado.php");
            die;
        } else {
            $mensaje = "Los datos son incorrectos.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Form06</title>
</head>

<body>
    <header>
        <h1>INICIO</h1>
    </header>
    <main>
            
        <form method="POST" action="">
            <label>Usuario</label><br>
            <input type="text" name="usuario"><br>

            <label>Contraseña</label><br>

            <input type="text" name="password"><br>

            <?php if (isset($mensaje)) echo "<p style='color:red;'>$mensaje</p>"; ?>
            <input type="submit">
        </form>
        
    </main>
</body>
</html>