<?php 
//añadir tarea
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;

if(!isset($_SESSION["conectado"])){
    header('Location: ../../public/index.php');
    die;
}

$db = new Basedatos();
$descripcion = $_POST['descripcion'] ?? '';

if(empty($descripcion)){
    header('Location: ../views/listado.php');
    die;
}

$sql="INSERT INTO tareas (descripcion, fecha_creacion, completada) VALUES (:descripcion, NOW(), 0)";
$parametros = [
    ':descripcion' => $descripcion
];
$sentencia = $db->get_data($sql, $parametros);
header('Location: ../views/listado.php');
die;
?>

