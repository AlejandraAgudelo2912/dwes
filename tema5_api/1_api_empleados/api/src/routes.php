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
    $data = json_decode(file_get_contents('php://input'), true);

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

            case 'POST':

                $insercionOK=$db->insertarEmpleado($data);
                if($insercionOK){
                    $respuesta =['mensaje' => 'Empleado añadido'];
                    http_response_code(201);
                    echo json_encode($respuesta);
                    exit();
                }else{
                    $respuesta=['mensaje' => 'Error al añadir persona'];
                    http_response_code(500);
                    echo json_encode($respuesta);
                    exit();
                }

                case 'DELETE':
                    if($userId!=null && $userId !=""){
                        $borrarOk=$db->borrarEmpleado($userId);
                        if($borrarOk){
                            $respuesta =["mensaje" => 'empelado borrado'];
                            http_response_code(200);
                            echo json_encode($respuesta);
                            exit();

                        }else{
                            $respuesta =["mensaje" => 'error al borrado'];
                            http_response_code(500);
                            echo json_encode($respuesta);
                            exit();
                        }
                    }

                case 'PUT':
                    
                    if($userId!=null && $userId !=""){
                        $actualizarOK=$db->actualizarEmpleado($userId, $data);

                            
                        if($actualizarOK){
                            $respuesta =['mensaje' => 'Empleado actualizado'];
                            http_response_code(201);
                            echo json_encode($respuesta);
                            exit();
                        }else{
                            $respuesta=['mensaje' => 'Error al actualizar persona'];
                            http_response_code(500);
                            echo json_encode($respuesta);
                            exit();
                        }
                    }

                   
                    
        default:
            header("HTTP/1.1 400 Bad Request");
            $respuesta = ["mensaje" => "No existe el endpoint"];
            echo json_encode($respuesta);
            die;


    }
}

