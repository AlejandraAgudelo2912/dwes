<?php

function recogerDatos(){
    $file="bbdd/data.json";
    $data=file_get_contents($file);
    $json=json_decode($data, true);

    return $json;
}

function filtrar_por_marca(){
    $json=recogerDatos();
    $marcas=[];
    foreach($json["coches"] as $coche){
        $marca=$coche["marca"];

        if(!in_array($marca,$marcas)){
            $marcas[]=$marca;
        }
    }
    return $marcas;
}

function recogerDatosUsuarios(){
    $file="bbdd/usuarios.json";
    $data=file_get_contents($file);
    $json=json_decode($data, true);

    return $json;
}

?>