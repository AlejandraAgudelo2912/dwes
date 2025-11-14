<?php

function recogerUsuarios(){
    $file="../bbdd/usuarios.json";
    $data=file_get_contents($file);
    $json=json_decode($data, true);
    return $json;
}