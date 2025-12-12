<?php

require __DIR__ . "/../vendor/autoload.php";

use App\models\Basedatos;

function manejarRequest($uri, $requestMethod, $param){

    $db = new Basedatos();
    if (!$db->estaConectado()){
        //Error de conexion a la bbdd
        http_response_code(500);
        $respuesta = ['error' => 'No es posible conectar a la base de datos'];
        echo json_encode($respuesta);
        die;
    }

    $partes = explode('/', $uri);

    if ($partes[4] !== 'api' || $partes[5] != 'empleados'){
        http_response_code(400);
        $respuesta = ['mensaje' => 'No existe el endpoint'];
        echo json_encode($respuesta);
        die;
    }

    //Miramos si hemos pedido usuario
    $userId = $partes[6] ?? null;

    //Router analizador de petición
    switch ($requestMethod){
        case 'GET':
            //endpoint /api/empleados/X
            if ($userId !==null && $userId != "") {

                $sql ="SELECT * FROM empleados WHERE id = :id";
                $statement = $db->get_data($sql, [":id" =>$userId]);
                $respuesta = $statement ->fetchAll(PDO::FETCH_ASSOC);

                if($respuesta==[]){
                    http_response_code(404);
                    echo json_encode(["error"=>"no existe el objeto con id $userId"]);
                    die;
                }else{
                    http_response_code(200);
                    echo json_encode($respuesta);
                    exit();
                }

            }else{
                //endpoint api/empleados/
                $sql ="SELECT * FROM empleados";
                $statement = $db->get_data($sql);
                $respuesta = $statement ->fetchAll(PDO::FETCH_ASSOC);

                http_response_code(200);
                echo json_encode($respuesta);
                die;

            }
            break;

        default:
            header("HTTP/1.1 400 Bad Request");
            $respuesta = ["mensaje" => "No existe el endpoint"];
            echo json_encode($respuesta);
            die;


    }
}

