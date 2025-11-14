<?php

include_once ("includes/funciones.php");
include_once ("models/book.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;
}else{
    $title=recoge("title");
    $author=recoge("author");
    $year=recoge("year");
    $caratula=recoge("caratula");
    $genre=recoge("genre");

    if($title==null || $author==null || $year==null || $genre==null){
        $mensaje = "Faltan datos obligatorios";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    if(tituloExiste($title)){
        $mensaje = "El título ya existe";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    if(empty($caratula)){
        $caratula = "bbdd/portadas/generico.jpg";
    }

    $caratula = "bbdd/portadas/generico.jpg";
    if (isset($_FILES["caratula"])) {
        $nombreArchivo = $_FILES["caratula"]["name"];
        $rutaDestino = "bbdd/portadas/".$nombreArchivo;
        if (move_uploaded_file($_FILES["caratula"]["tmp_name"], $rutaDestino)) {
            $caratula = $rutaDestino;
        }
    }

    $libro = new Book($title, $author, $year, $caratula, $genre);
    guardar($libro);

    header("Location: index.php");
    die;
}
