<?php
require_once ("includes/funciones.php");
require_once ("models/user.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;
}
else{
    $mensaje ="";
    $nombre=recoge("nombre");
    $email=recoge("email");
    $password1=recoge("password1");
    $password2=recoge("password2");
    $listaUsuarios=[];
    $file = "data.json";
    $jsonData = file_get_contents("./bbdd/$file");
    $listaUsuarios = json_decode($jsonData);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $mensaje.="El email no es correcto";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    //comprobar email si existe
    $emailExiste=checkemail($email);
    if($emailExiste){
        $mensaje.="El email ya existe";
        header("Location: alta.php?mensaje=$mensaje");
        die;    
    }

    if($password1 !== $password2){
        $mensaje.="Las contraseñas no coinciden";
        header("Location: alta.php?mensaje=$mensaje");
        die;    

    }

    $usuarioCreado=new User($nombre, $email, $password1);
    $listaUsuarios[]= $usuarioCreado;

    //añadir al fichero json el nuevo usuario 

    file_put_contents("./bbdd/$file", json_encode($listaUsuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    $mensaje.="Usuario creado correctamente";
    header("Location: index.php?mensaje=$mensaje");
    die;

    
}



