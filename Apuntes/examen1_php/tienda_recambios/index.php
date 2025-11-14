<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Autopart</title>
    </head>
    <body>
        
        


    </body>
</html>
