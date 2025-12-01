<?php 
//eliminar tarea
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;

if(!isset($_SESSION["conectado"])){
    header('Location: ../../public/index.php');
    die;
}


if(isset($_POST['id'])){
    $id=$_POST['id'];
    $db=new Basedatos();
    $db->borrar_tarea($id);
}

header('Location: ../views/listado.php');
die;
?>