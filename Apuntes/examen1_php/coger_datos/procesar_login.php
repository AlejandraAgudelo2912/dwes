<?php
session_start();

require_once "recoger_datos.php";

if($_SERVER["REQUEST_METHOD"]!="POST"){
    header("Location: login.php");
    die;
}

$usuario=$_POST["nameUser"] ;
$password=$_POST["password"];
$errores=[];

if(empty($usuario)){
    $errores['usuario'] = "El campo usuario es obligatorio";
}

if(empty($password)){
    $errores['password'] = "El campo contraseña es obligatorio";
}

$json=recogerDatosUsuarios();

foreach($json["usuarios"] as $user){
    if($user["usuario"]==$usuario && password_verify($password, $user["password"])){
        $_SESSION['usuario']=$user;
        unset($_SESSION['nameUser']);
        unset($_SESSION['password']);
        unset ($_SESSION['errores']);

        header("Location: index.php");
        die;
    }
    $errores['login'] = "Usuario o contraseña incorrectos.";
}
$_SESSION['nameUser']=$usuario;
$_SESSION['password']=$password;
$_SESSION['errores']=$errores;

header("Location: login.php");

