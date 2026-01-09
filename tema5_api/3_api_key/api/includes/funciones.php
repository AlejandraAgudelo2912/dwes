<?php

function obtener_rol($key){

    $host='127.0.0.1';
    $db = 'libros_apikey';
    $user='root';
    $pass='';
    $charset='utf8mb4';
    $motor='mysql';

    $dsn="$motor:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo=new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $keyHash= hash('sha256', $key);
        $sql="SELECT rol FROM api_keys WHERE api_key =:api_key";
        
        $stmt = $pdo ->prepare($sql);
        $stmt->execute([':api_key'=>$keyHash]);
        $rol = $stmt->fetchColumn();

    }catch(PDOException $e){
        http_response_code(500);
        echo json_encode("error <<<<<---- de conexion ");
        die;

    }

    return $rol;
}