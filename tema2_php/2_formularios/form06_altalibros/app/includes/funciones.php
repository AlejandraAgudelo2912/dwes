<?php
require_once ("models/book.php");
function recoge($var)
{
    if (isset($_REQUEST[$var])) {
        if ($_REQUEST[$var] != "") {
            if (is_array($_REQUEST[$var])) {
                $tmp = [];
                foreach ($_REQUEST[$var] as $valor) {
                    $tmp[] = trim(htmlspecialchars(strip_tags($valor)));
                }
                return $tmp;
            } else {
                $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
                return $tmp;
            }
        }
    }
    return null;
}

function tituloExiste($titulo){
    $listaLibros=obtener();
    foreach($listaLibros as $libro){
        if($libro->title==$titulo){
            return true;
        }
    }
    return false;
}

function guardar($libro){
    $listaLibros=[];
    $file = "data.json";
    $jsonData = file_get_contents("./bbdd/$file");
    $listaLibros = json_decode($jsonData);
    
    $listaLibros[]=$libro;
    $jsonData = json_encode($listaLibros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents("./bbdd/$file", $jsonData);
}

function obtener(){
    $listaLibros=[];
    $file = "data.json";
    $jsonData = file_get_contents("./bbdd/$file");
    $listaLibros = json_decode($jsonData);
    return $listaLibros;
}

function borrarLibro($titulo){
    $listaLibros=obtener();
    $nuevaLista=[];
    foreach ($listaLibros as $libro) {
        if($libro->title!=$titulo){
            $nuevaLista[]=$libro;
        }
        
    }
    file_put_contents("bbdd/data.json", json_encode($nuevaLista, JSON_PRETTY_PRINT));

    return $nuevaLista;
}