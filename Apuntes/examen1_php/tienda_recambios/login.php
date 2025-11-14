<?php
    session_start();
    
    if(isset($_SESSION['usuario'])){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title> Login</title>
    </head>
    <body>
        <form action="procesar_login.php">
            <label for="nameUser" >Nombre de USUARIO</label>
            <input type="text" name="nameUser" value="<?php echo $_SESSION['nameUser'] ?? null ?>">

            <?php 
                if(isset($_SESSION['errores']['userName'])){
                    echo "<p class='in-fade-out'>".$_SESSION['errores']['nameUser']."</p>";
                }
            ?>

            <label for="password">Contraseña</label>
            <input type="text" name="password" value="<?php echo $_SESSION['password'] ?? null ?>">

            <?php 
                if(isset($_SESSION['errores']['password'])){
                    echo "<p class='in-fade-out'>".$_SESSION['errores']['password']."</p>";
                }
            ?>

            <input type="submit" value="Login">

            <?php 
                if(isset($_SESSION['errores']['login'])){
                    echo "<p class='in-fade-out'>".$_SESSION['errores']['login']."</p>";
                }
                unset($_SESSION['errores']);
            ?>
        </form>


    </body>
</html>
