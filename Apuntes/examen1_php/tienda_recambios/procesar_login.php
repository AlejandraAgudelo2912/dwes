<?php
session_start();
require_once "includes/funciones.php";


if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: index.php");
    die;
}

$userName=$_SESSION['userName'];
$password=$_SESSION['password'];

$errores=[];

if(empty($userName)){
    $errores['userName']="El nombre de usuario no puede estar vacío";
}
if(empty($password)){
    $errores['password']="La contraseña no puede estar vacía";
}

$json = recogerUsuarios();

foreach ($json['usuarios'] as $user) {
    if($user['usuario']==$usuario && password_verify($password, $user['password'])){
        $_SESSION['usuario']=$user;
        unset($_SESSION['errores'], $_SESSION['userName'],$_SESSION['password']);
        header("Location: index.php");
        die;
    }

    $errores['login']="Error con el nombre de usuario o la contraseña";
}

$_SESSION['errores']=$errores;
$_SESSION['userName']=$userName;
$_SESSION['password']=$password;
header("Location: login.php");

?>