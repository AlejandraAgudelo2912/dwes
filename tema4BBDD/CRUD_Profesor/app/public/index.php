<?php 
session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\Models\Basedatos;


$dbInstancia = Basedatos::getInstance(); 

if ($dbInstancia->getConnection()!=null){
    $_SESSION["conectado"]=true;
    header ("Location: ../src/views/listado.php");
}else{
    echo "ERROR en la conexion a la base de datos.";
    die;
}

?>

