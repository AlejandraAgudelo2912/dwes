<?php
require __DIR__ . "/../../vendor/autoload.php";
use App\Models\Basedatos;

session_start();


if($_SERVER["REQUEST_METHOD"]!="POST"){
    header("Location: ./../../index.php");
    die;
}

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$todoOk=true;


if($email===""){
    $todoOk=false;
    $_SESSION['error']['email']="El email no puede estar vacio";
}

if($password ===""){
    $todoOk=false;
    $_SESSION['error']['password']="La contraseña no puede estar vacia";
}


if($todoOk===false){
    header ("Location: ./../views/login.php");
    die;
}

 

$basedatos = new BaseDatos();

$sql = "SELECT * FROM usuario WHERE email = :email";
$parametros = [":email"=>$email];
$sentencia = $basedatos->get_data($sql, $parametros);

if($sentencia != null){
    $registroUsuario= $sentencia->fetch(PDO::FETCH_OBJ);


   


    if ($registroUsuario===false){
        //no hay tuplas
        $_SESSION['error']['login']="ERROR de login";
        enviar_log("Usuario $email intenta loguearse", "info");
        header("Location: ./../views/login.php");
        die;
    }else{
        if(password_verify($password,$registroUsuario->password)){
            $_SESSION['usuario']['nombre'] = $registroUsuario->nombre;
            $_SESSION['usuario']['rol'] = $registroUsuario->rol;
            $_SESSION['usuario']['id'] = $registroUsuario->id;

            enviar_log("USUARIO $email logueado", "info");
            header("Location: ./../views/listado.php");
            die;


        }else{
            $_SESSION['error']['login']="ERROR de login";
            enviar_log("ERROR de login $email intenta loguearse", "info");
            header("Location: ./../views/login.php");
            die;
        }
    }
}

