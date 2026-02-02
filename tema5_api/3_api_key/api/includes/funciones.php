<?php

function conectarBBDD(){

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

    }catch(PDOException $e){
        http_response_code(500);
        echo json_encode("error <<<<<---- de conexion ");
        die;

    }
    return $pdo;

}

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

function obtenerLibros($titulo = null){
    $pdo = conectarBBDD();

    if($titulo == null){
        $sql= "SELECT * FROM libro";

    }else{
        $titulo = "%$titulo%";
        $sql = "SELECT * FROM libro WHERE titulo LIKE :titulo";

    }


    try{
        $stmt = $pdo->prepare($sql);

        if($titulo!=null){
            $stmt->execute([":titulo"=>$titulo]);
        }else{
            $stmt->execute();
        }

        $libros=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $libros;
    }catch(PDOException $e){
        http_response_code(500);
        echo json_encode("error <<<<<---- de conexion ");
        die;

    }
}

function insertarLibro($libro){
    $pdo=conectarBBDD();

    $titulo = $libro["titulo"];
    $autor = $libro["autor"];
    $genero = $libro["genero"];

    $sql = "INSERT INTO libro (titulo, autor, genero) VALUES (:titulo, :autor, :genero)";

    try {
        $sentencia=$pdo->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":autor", $autor);
        $sentencia->bindParam(":genero", $genero);

        $sentencia->execute();
        return true;

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode("error al insertar ");
        die;

    }
   
}