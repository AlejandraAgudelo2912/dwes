<?php 
//añadir tarea
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;
use App\models\Tarea;

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

$tarea =new Tarea (null,$descripcion,0);

$db->crear_tarea($tarea);

header('Location: ../views/listado.php');
die;
?>

