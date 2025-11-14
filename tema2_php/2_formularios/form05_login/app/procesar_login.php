<?php
require_once ("includes/funciones.php");
require_once ("models/user.php");
if($_SERVER["REQUEST_METHOD"]!="POST"){
    header("Location: index.php");
    die;
}
else{

    $mensaje="";
    $email=$_POST["email"];
    $password=$_POST["password"];

    $login = checkuser($email, $password);
    if($login == null){
        $mensaje="Error en las credenciales";
        header("Location: login.php?mensaje=$mensaje");
        die;
    }
    else{
        $mensaje="Login correcto. Bienvenido ".$login->getNombre();
        header("Location: index.php?mensaje=$mensaje");
        die;
    }
}
