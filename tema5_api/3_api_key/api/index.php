<?php

require_once __DIR__ . "/includes/funciones.php";

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: GET,POST,PATCH,DELETE");
header("Access-Control-Max-Age: 3400");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
$param = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
$requestMethod = $_SERVER["REQUEST_METHOD"];

$headers = apache_request_headers(); 

$keyRecibida=$headers["x-API-key"] ?? ""; //recoger la api gay

$rol=obtener_rol($keyRecibida);


if(!$rol){
    http_response_code(401);
    echo json_encode("API key no valida");
    die;
}

$partes=explode('/', $uri);

if ($partes[4] !=='api' || $partes[5] !='libros'){

    http_response_code(400);
    $respuesta=['mensaje'=>'No existe el endpoint'];
    echo json_encode($respuesta);
    die;
}

$titulo = $partes[6] ?? null;

switch ($requestMethod){
    case 'GET':
        break;
    case 'POST':
        break;
}