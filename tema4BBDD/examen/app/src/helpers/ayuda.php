<?php
require __DIR__ . "/../../vendor/autoload.php";

function nombre_dado_id(){
    
}

function enviar_log($mensaje, $tipo){
    $archivo_log = __DIR__ . "/../../logs/app.log";

    $linea_log = "[$tipo] $mensaje\n";
    
    file_put_contents($archivo_log, $linea_log, FILE_APPEND);

}

function saluda(){
    echo "HOLAAAAAA";
}

