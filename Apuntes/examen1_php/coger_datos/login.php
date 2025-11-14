<?php
session_start();

if (isset($_SESSION['usuario'])){
    header("Location: index.php");
    die;
}

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset ="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="procesar_login.php" method="post">

            <label for="usuario">Usuario:</label>
            <input type="text" name="nameUser" id="usuario" value="<?php echo $_SESSION['nameUser'] ?? null ?>" >
            <?php
                if (isset($_SESSION['errores']['usuario'])){
                    echo "<span style='color:red'>".$_SESSION['errores']['usuario']."</span>";
                    unset($_SESSION['errores']['usuario']);
                }
            ?>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" value="<?php echo $_SESSION['password'] ?? null ?>" >
            <?php
                if (isset($_SESSION['errores']['password'])){
                    echo "<span style='color:red'>".$_SESSION['errores']['password']."</span>";
                    unset($_SESSION['errores']['password']);
                }
            ?>
            <br>
            <input type="submit" value="Iniciar sesión">
            <?php
                if (isset($_SESSION['errores']['login'])){
                    echo "<span style='color:red'>".$_SESSION['errores']['login']."</span>";
                    unset($_SESSION['errores']);
                }
            ?>

        </form>
       
    </body>
</html>